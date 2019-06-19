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

    'inventory' => [
        'title' => 'Inventory',

        'actions' => [
            'index' => 'Inventory',
            'create' => 'New Inventory',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'product_id' => "Product",
            'inventory_quantity' => "Inventory quantity",
            
        ],
    ],

    'service' => [
        'title' => 'Service',

        'actions' => [
            'index' => 'Service',
            'create' => 'New Service',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'service_name' => "Service name",
            'service_description' => "Service description",
            'service_selling_price' => "Service selling price",
            'service_num_days' => "Service num days",
            
        ],
    ],

    'invoice' => [
        'title' => 'Invoice',

        'actions' => [
            'index' => 'Invoice',
            'create' => 'New Invoice',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'amount' => "Amount",
            'person_id' => "Person",
            
        ],
    ],

    'invoice-item' => [
        'title' => 'Invoice Item',

        'actions' => [
            'index' => 'Invoice Item',
            'create' => 'New Invoice Item',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'product_id' => "Product",
            'invoice_id' => "Invoice",
            'service_id' => "Service",
            'quantity' => "Quantity",
            
        ],
    ],

    'rank' => [
        'title' => 'Rank',

        'actions' => [
            'index' => 'Rank',
            'create' => 'New Rank',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'rank_name' => "Rank name",
            'rank_description' => "Rank description",
            'rank_order' => "Rank order",
            
        ],
    ],

    'student-rank' => [
        'title' => 'Student Rank',

        'actions' => [
            'index' => 'Student Rank',
            'create' => 'New Student Rank',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'rank_id' => "Rank",
            'student_id' => "Student",
            'awarded_date' => "Awarded date",
            
        ],
    ],

    'batch' => [
        'title' => 'Batch',

        'actions' => [
            'index' => 'Batch',
            'create' => 'New Batch',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'batch_name' => "Batch name",
            'batch_rank_id' => "Batch rank",
            
        ],
    ],

    'schedule' => [
        'title' => 'Schedule',

        'actions' => [
            'index' => 'Schedule',
            'create' => 'New Schedule',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'day_of_week' => "Day of week",
            'start_time' => "Start time",
            'end_time' => "End time",
            'batch_id' => "Batch",
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];