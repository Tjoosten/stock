<?php namespace Codivex\Services;

use Codivex\Validators\RegistrationValidator;
use Codivex\Exceptions\ValidationException;
use Registration;
use Stock;
use Customer;

class RegistrationCreatorService {
    protected $validator;

    public function __construct(RegistrationValidator $validator)
    {
        $this->validator = $validator;
    }

    public function make(array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            // Create Array from single element..

            foreach($attributes['stock_id'] as $stock_id)
            {
                if($attributes['status'] == 7)
                {
                    // Forward (Checkin and Checkout)
                    for($i = 1; $i <= 2; $i++)
                    {
                        $attributes['status'] = $i;
                        $this->createRegistration($attributes, $stock_id);
                        // Terugzetten naar oude status voor vorig product
                        $attributes['status'] = 7;
                    }
                } else {
                    $this->createRegistration($attributes, $stock_id);
                }
            }
            return true;
        }

        throw new ValidationException('Registration validation failed', $this->validator->getErrors());
    }

    public function createRegistration($attributes, $stock_id)
    {
        $registration = new Registration();
        $registration->stock_id = $stock_id;
        $registration->status = $attributes['status'];

        if($attributes['status'] == 4)
        {
            // Update S/N
            $stock = Stock::find($stock_id);

            // Save old number for rollback
            $oldSN = $stock->serialNumber;
            $registration->oldSn = $oldSN;

            $stock->serialNumber = $attributes['serialNumber'];
            $stock->save();

            $attributes['description'] = "Nieuw Serienummer " . $attributes['serialNumber'] . ". </br>Het oude S/N " . $oldSN;
        }

        if($attributes['status'] == 5)
        {
            // Update bedrijf
            $stock = Stock::find($stock_id);
            $stock->customer_id = $attributes['toFactory'];
            $stock->save();

            $newFactory = Customer::find($stock->customer_id)->name;
            // Save old factory ID for rollback
            $registration->oldFactory = $stock->customer->id;

            $attributes['description'] = "Product verplaatst van bedrijf <strong>" . $stock->customer->name . "</strong> naar <strong>" . $newFactory. "</strong>";
        }

        $registration->description = $attributes['description'];
        $registration->save();
    }

    public function update($id, array $attributes)
    {
        if($this->validator->isValidUpdate($attributes))
        {
            $registration = Registration::find($id);
            $registration->update($attributes);

            return true;
        }

        throw new ValidationException('Registration update validation failed', $this->validator->getErrors());
    }
}