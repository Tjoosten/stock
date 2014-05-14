<?php
use Codivex\Observers\RegistrationObserver;
use Codivex\Observers\CustomerObserver;
use Codivex\Observers\ProductObserver;
use Codivex\Observers\StockObserver;
use Codivex\Observers\SupplierObserver;

/**
 * Observers for event loggin
 */

Registration::observe(new RegistrationObserver());
Customer::observe(new CustomerObserver());
Product::observe(new ProductObserver());
Stock::observe(new StockObserver());
Supplier::observe(new SupplierObserver());