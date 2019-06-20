<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Person::class, function (Faker\Generator $faker) {
    return [
        'person_fname' => $faker->sentence,
        'person_lname' => $faker->sentence,
        'mobile_no' => $faker->randomNumber(5),
        'email' => $faker->email,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Student::class, function (Faker\Generator $faker) {
    return [
        'dob' => $faker->date(),
        'address' => $faker->sentence,
        'mother_id' => $faker->randomNumber(5),
        'father_id' => $faker->randomNumber(5),
        'status' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'description' => $faker->sentence,
        'cost_price' => $faker->randomFloat,
        'selling_price' => $faker->randomFloat,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Inventory::class, function (Faker\Generator $faker) {
    return [
        'product_id' => $faker->randomNumber(5),
        'inventory_quantity' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Service::class, function (Faker\Generator $faker) {
    return [
        'service_name' => $faker->sentence,
        'service_description' => $faker->sentence,
        'service_selling_price' => $faker->randomFloat,
        'service_num_days' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Invoice::class, function (Faker\Generator $faker) {
    return [
        'amount' => $faker->randomFloat,
        'person_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\InvoiceItem::class, function (Faker\Generator $faker) {
    return [
        'product_id' => $faker->randomNumber(5),
        'invoice_id' => $faker->randomNumber(5),
        'service_id' => $faker->randomNumber(5),
        'quantity' => $faker->randomFloat,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Rank::class, function (Faker\Generator $faker) {
    return [
        'rank_name' => $faker->sentence,
        'rank_description' => $faker->sentence,
        'rank_order' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\StudentRank::class, function (Faker\Generator $faker) {
    return [
        'rank_id' => $faker->randomNumber(5),
        'student_id' => $faker->randomNumber(5),
        'awarded_date' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Batch::class, function (Faker\Generator $faker) {
    return [
        'batch_name' => $faker->sentence,
        'batch_rank_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Schedule::class, function (Faker\Generator $faker) {
    return [
        'day_of_week' => $faker->sentence,
        'start_time' => $faker->time(),
        'end_time' => $faker->time(),
        'batch_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Attendance::class, function (Faker\Generator $faker) {
    return [
        'batch_id' => $faker->randomNumber(5),
        'student_id' => $faker->randomNumber(5),
        'comment' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

