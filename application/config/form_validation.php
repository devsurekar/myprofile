<?php

$config = array(
        'fcuserdetailfactory/addUpdateUser' => array(
                array(
                        'field' => 'first_name',
                        'label' => 'First Name',
                        'rules' => 'required|max_length[50]|alpha'
                ),
                array(
                        'field' => 'last_name',
                        'label' => 'Last Name',
                        'rules' => 'required|max_length[50]|alpha'
                ),
                array(
                        'field' => 'middle_name',
                        'label' => 'Middle Name',
                        'rules' => 'max_length[50]|alpha'
                ),
                array(
                        'field' => 'gender',
                        'label' => 'Gender',
                        'rules' => 'required|max_length[1]|alpha'
                ),
                array(
                        'field' => 'contact_no1',
                        'label' => 'Primary Contact Number',
                        'rules' => 'required|max_length[10]|numeric'
                ),
                array(
                        'field' => 'contact_no2',
                        'label' => 'Secondary Contact Number',
                        'rules' => 'max_length[10]|numeric'
                ),
                array(
                        'field' => 'current_address',
                        'label' => 'Current Address',
                        'rules' => 'required|max_length[200]|callback_checkCustomAlpha'
                ),
                array(
                        'field' => 'per_address',
                        'label' => 'permanent Address',
                        'rules' => 'required|max_length[200]|callback_checkCustomAlpha'
                ),
                array(
                        'field' => 'city',
                        'label' => 'City',
                        'rules' => 'max_length[50]|alpha'
                ),
                array(
                        'field' => 'state',
                        'label' => 'State',
                        'rules' => 'max_length[50]|alpha'
                ),
                array(
                        'field' => 'country',
                        'label' => 'Country',
                        'rules' => 'max_length[50]|alpha'
                ),
                array(
                        'field' => 'birth_date',
                        'label' => 'Date of Birth',
                        'rules' => 'required|callback_checkDateFormat'
                ),
                array(
                        'field' => 'facebook_link',
                        'label' => 'Facebook Link',
                        'rules' => 'trim|callback_checkUrl'
                ),
                array(
                        'field' => 'linkedin_link',
                        'label' => 'Linked In Link',
                        'rules' => 'trim|callback_checkUrl'
                ),
                array(
                        'field' => 'twitter_link',
                        'label' => 'Twitter Link',
                        'rules' => 'trim|callback_checkUrl'
                )
        ),
        'fcuserpersonaldetailfactory/addUpdatePersonalDetail' => array(
                array(
                        'field' => 'marital_status',
                        'label' => 'Marital Status',
                        'rules' => 'required|max_length[1]|alpha'
                ),
                array(
                        'field' => 'hobby',
                        'label' => 'Hobbies',
                        'rules' => 'max_length[200]|callback_checkCustomAlpha'
                ),
                array(
                        'field' => 'strenth',
                        'label' => 'Strenth',
                        'rules' => 'max_length[200]|callback_checkCustomAlpha'
                ),
                array(
                        'field' => 'weaknes',
                        'label' => 'Weakness',
                        'rules' => 'max_length[200]|callback_checkCustomAlpha'
                )
        )
);
?>