<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => "ID",
            'first_name' => "First name",
            'last_name' => "Last name",
            'email' => "Email",
            'password' => "Password",
            'password_repeat' => "Password Confirmation",
            'activated' => "Activated",
            'forbidden' => "Forbidden",
            'language' => "Language",
                
            //Belongs to many relations
            'roles' => "Roles",
                
        ],
    ],

    'person' => [
        'title' => 'Person',

        'actions' => [
            'index' => 'Person',
            'create' => 'New Person',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'person_fname' => "Person fname",
            'person_lname' => "Person lname",
            'mobile_no' => "Mobile no",
            'email' => "Email",
            
        ],
    ],

    'student' => [
        'title' => 'Student',

        'actions' => [
            'index' => 'Student',
            'create' => 'New Student',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'dob' => "Dob",
            'address' => "Address",
            'mother_id' => "Mother",
            'father_id' => "Father",
            'status' => "Status",
            
        ],
    ],

    'product' => [
        'title' => 'Product',

        'actions' => [
            'index' => 'Product',
            'create' => 'New Product',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            'description' => "Description",
            'cost_price' => "Cost price",
            'selling_price' => "Selling price",
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];