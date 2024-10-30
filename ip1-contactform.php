<?php

/**
 * Plugin Name: iP.1 Contact Form
 * Description: This plugin is the best way to give your customers the ability to add themselves to your contacts database in our site, where you'll be free to send them your emails, surveys and SMS messages. To get started: activate the plugin and then go to your iP.1 Settings page to set up your API key.
 * Version: 1.0.3
 * Author: iP.1 Networks AB
 * Author URI: https://www.ip1sms.com/
 * License: GPLv2 or later
 */
function ip1_cf_contact_form()
{
    $header = get_option('ip1_contact_form_header', '');
    $properties = ip1_cf_trim_array(explode(",", get_option('ip1_contact_form_properties', '')));
    $labels_header = get_option('ip1_contact_form_labels_header', '');
    $option_labels = ip1_cf_trim_array(explode(",", get_option('ip1_contact_form_option_labels', '')));

    ob_start(); ?>
    <html>

    <head>
        <style>
            .ip1-contact-form-body {
                margin-left: auto;
                margin-right: auto;
            }

            .ip1-contact-form-properties-label {
                display: block;
            }

            .ip1-contact-form-labels-checkbox {
                margin-left: 1em;
            }

            .ip1-contact-form-submit-button {
                margin: 1em 0;
            }
        </style>
    </head>

    <body class="ip1-contact-form-body">
        <div class="ip1-contact-form-container">
            <h4 class="ip1-contact-form-main-label"><?php echo esc_html($header); ?></h4>
            <form action="" method="post">
                <div class="ip1-contact-form-input-container">
                    <div class="ip1-contact-form-input-group ip1-contact-form-required-field">
                        <label class="ip1-contact-form-properties-label" for="firstName">First name*</label>
                        <input class="ip1-contact-form-properties-input" id="firstName" name="firstName" type="text" required />
                    </div>
                    <div class="ip1-contact-form-input-group ip1-contact-form-required-field">
                        <label class="ip1-contact-form-properties-label" for="lastName">Last name*</label>
                        <input class="ip1-contact-form-properties-input" id="lastName" name="lastName" type="text" required />
                    </div>
                    <div class="ip1-contact-form-input-group ip1-contact-form-required-field">
                        <label class="ip1-contact-form-properties-label" for="email">E-mail address*</label>
                        <input class="ip1-contact-form-properties-input" id="email" name="email" type="email" required />
                    </div>
                    <div class="ip1-contact-form-input-group ip1-contact-form-required-field">
                        <label class="ip1-contact-form-properties-label" for="region">Country*</label>
                        <select class="ip1-contact-form-properties-input" id="region" name="region" required>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia</option>
                            <option value="BQ">Bonaire</option>
                            <option value="BA">Bosnia</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="HR">Croatia</option>
                            <option value="CW">Curavßao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="VA">Vatican</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KR">Korea</option>
                            <option value="KW">Kuwait</option>
                            <option value="LA">Lao</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao</option>
                            <option value="MK">Macedonia</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia</option>
                            <option value="MD">Moldova</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestine</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="RE">Réunion</option>
                            <option value="SH">Saint Helena</option>
                            <option value="KN">Saint Kitts</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin</option>
                            <option value="PM">Saint Pierre</option>
                            <option value="VC">Saint Vincent</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SX">Sint Maarten</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE" selected>Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="TW">Taiwan</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands, British</option>
                            <option value="VI">Virgin Islands, U.S.</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                            <option value="AX">Åland Islands</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="IC">Canary Islands</option>
                        </select>
                    </div>
                    <div class="ip1-contact-form-input-group ip1-contact-form-required-field">
                        <label class="ip1-contact-form-properties-label" for="phoneNumber">Phone number*</label>
                        <input class="ip1-contact-form-properties-input" id="phoneNumber" name="phoneNumber" type="tel" pattern="^[+]?[0-9]{3,15}$" required />
                    </div>
                    <div class="ip1-contact-form-input-group ip1-contact-form-required-field">
                        <label class="ip1-contact-form-properties-label" for="organization">Organization</label>
                        <input class="ip1-contact-form-properties-input" id="organization" name="organization" type="text" />
                    </div>
                    <?php foreach ($properties as $property) { ?>
                        <div class="ip1-contact-form-input-group">
                            <label class="ip1-contact-form-properties-label" for="<?php echo esc_attr($property); ?>"><?php echo esc_attr($property); ?></label>
                            <input class="ip1-contact-form-properties-input" id="<?php echo esc_attr($property); ?>" name="<?php echo esc_attr($property); ?>" type="text" />
                        </div>
                    <?php } ?>
                    <div>
                        <label class="ip1-contact-form-labels-header"><?php echo esc_html($labels_header); ?></label>
                    </div>
                    <?php foreach ($option_labels as $label) { ?>
                        <div class="ip1-contact-form-input-group">
                            <input class="ip1-contact-form-labels-checkbox" id="<?php echo esc_attr(sanitize_html_class(sanitize_title($label))); ?>" name="<?php echo esc_attr($label); ?>" type="checkbox" />
                            <label class="ip1-contact-form-labels-label" for="<?php echo esc_attr(sanitize_html_class(sanitize_title($label))); ?>"><?php echo esc_html($label); ?></label>
                        </div>
                    <?php } ?>
                    <input class="ip1-contact-form-submit-button" type="submit" name="ip1-submit-contact" value="Add contact" />
                </div>
            </form>
        </div>
    </body>

    </html>
<?php
    return ob_get_clean();
}
add_shortcode('ip1_contact_form', 'ip1_cf_contact_form');

function ip1_cf_add_contact()
{
    if (array_key_exists('ip1-submit-contact', $_POST)) {
        $token = get_option('ip1_contact_form_token', '');
        $default_labels = ip1_cf_trim_array(explode(",", get_option('ip1_contact_form_default_labels', '')));
        $option_labels = ip1_cf_trim_array(explode(",", get_option('ip1_contact_form_option_labels', '')));
        $properties = array_merge(['firstName', 'lastName', 'email', 'region', 'phoneNumber', 'organization'], ip1_cf_trim_array(explode(",", get_option('ip1_contact_form_properties', ''))));

        $properties_obj = new StdClass();
        $labels_array = $default_labels;

        foreach ($properties as $property) {
            if (array_key_exists($property, $_POST)) {
                $property_value = trim(sanitize_text_field($_POST[$property]));

                if ($property_value !== '') {
                    switch ($property) {
                        case 'email':
                            $property_value = sanitize_email($property_value);
                            break;
                    }

                    $properties_obj->$property = $property_value;
                }
            }
        }

        foreach ($option_labels as $label) {
            if (array_key_exists($label, $_POST)) {
                array_push($labels_array, $label);
            }
        }

        $obj = (object)array('properties' => $properties_obj, 'labels' => $labels_array);

        $validation = ip1_cf_validate_phone_number($obj->properties->phoneNumber, $obj->properties->region);
        if ($validation->isValid) {
            $obj->properties->phoneNumber = $validation->e164Format;

            $response = wp_remote_post('https://api.ip1sms.com/v2/contacts', array(
                'headers' => array(
                    'Authorization' => "Bearer $token",
                    'Content-Type' => "application/json",
                ),
                'body' => json_encode(array($obj))
            ));

            $httpCode = wp_remote_retrieve_response_code($response);
            if ($httpCode == 202) {
                echo "<script>alert('Contact added successfully')</script>";
            } else {
                echo "<script>alert('Adding contact failed please call support')</script>";
            }
        } else {
            echo "<script>alert('invalid phone number')</script>";
        }
    }
}
add_action('wp_head', 'ip1_cf_add_contact');

function ip1_cf_admin_menu_option()
{
    add_menu_page('Contact form', 'iP.1 Settings', 'manage_options', 'ip1_cf_contact_form_settings', 'ip1_cf_settings_page', 'https://contacts.ip1.net/en-US/assets/icons/favicon.png');
}
add_action('admin_menu', 'ip1_cf_admin_menu_option');

function ip1_cf_settings_page()
{
    if (array_key_exists('submit-ip1-contact-form-settings', $_POST)) {
        update_option('ip1_contact_form_header', sanitize_text_field($_POST['header']));
        update_option('ip1_contact_form_token', sanitize_text_field($_POST['token']));

        $property_array = ip1_cf_trim_array(explode(",", sanitize_text_field($_POST['properties'])));
        for ($index = 0; $index < sizeof($property_array); $index++) {
            $property_array[$index] = sanitize_html_class(sanitize_title($property_array[$index]));
        }
        update_option('ip1_contact_form_properties', implode(',', ip1_cf_trim_array($property_array)));

        update_option('ip1_contact_form_default_labels', implode(',', ip1_cf_trim_array(explode(",", sanitize_text_field($_POST['default-labels'])))));
        update_option('ip1_contact_form_labels_header', sanitize_text_field($_POST['labels-header']));
        update_option('ip1_contact_form_option_labels', implode(',', ip1_cf_trim_array(explode(",", sanitize_text_field($_POST['option-labels'])))));
    }

    $header = get_option('ip1_contact_form_header', '');
    $token = get_option('ip1_contact_form_token', '');
    $properties = get_option('ip1_contact_form_properties', '');
    $default_labels = get_option('ip1_contact_form_default_labels', '');
    $labels_header = get_option('ip1_contact_form_labels_header', '');
    $option_labels = get_option('ip1_contact_form_option_labels', '');
?>
    <table>
        <tr>
            <td>
                <div>
                    <form method="post" action="">
                        <table>
                            <tr>
                                <td>
                                    <h2>iP.1 Contact form settings</h2>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="header">Header</label></td>
                            </tr>
                            <tr>
                                <td><label for="header">Title of the form.</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="header" style="width:400px; margin-bottom:30px;" value="<?php print $header; ?>" placeholder="Please add your contact information to our data base." /></td>
                            </tr>
                            <tr>
                                <td><label for="token">Token</label></td>
                            </tr>
                            <tr>
                                <td><label for="token">You can get one for your account from <a href="https://portal.ip1.net/" target="_blank">Here</a>.</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="token" style="width:400px; margin-bottom:30px;" value="<?php print $token; ?>" /></td>
                            </tr>
                            <tr>
                                <td><label for="properties">Properties</label></td>
                            </tr>
                            <tr>
                                <td><label for="properties">One or more separated by comma "," to add custom fields to your contacts.</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="properties" style="width:400px; margin-bottom:30px;" value="<?php print $properties; ?>" placeholder="Address, height, size, etc." /></td>
                            </tr>
                            <tr>
                                <td><label for="default-labels">Default labels</label></td>
                            </tr>
                            <tr>
                                <td><label for="default-labels">To group all the contacts with one or more labels separated by comma ",".</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="default-labels" style="width:400px; margin-bottom:30px;" value="<?php print $default_labels; ?>" placeholder="wordpress, myWebsite, etc." /></td>
                            </tr>
                            <tr>
                                <td><label for="labels-header">Labels header</label></td>
                            </tr>
                            <tr>
                                <td><label for="labels-header">Title of the labels.</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="labels-header" style="width:400px; margin-bottom:30px;" value="<?php print $labels_header; ?>" placeholder="What are your general interests?." /></td>
                            </tr>
                            <tr>
                                <td><label for="option-labels">Optional labels</label></td>
                            </tr>
                            <tr>
                                <td><label for="option-labels">One or more labels separated by comma "," to let users choose groups.</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="option-labels" style="width:400px; margin-bottom:30px;" value="<?php print $option_labels; ?>" placeholder="Cooking, Music, Sports, etc." /></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="submit-ip1-contact-form-settings" style="width:100px" class="button button-primary" value="Save" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </td>
            <td style="vertical-align: top;">
                <div style="margin-left: 200px;">
                    <h2>How to start</h2>
                    <p style="margin-left: 10px; margin-bottom: 40px;">
                        After you activate this plugin, you should have an active account in our site <a href="https://www.ip1sms.com/" target="_blank">https://www.ip1sms.com/</a>.<br>
                        Then you have to create a new api-key (token) from <a href="https://portal.ip1.net/" target="_blank">Here</a>, copy it and add it to settings on the left.<br>
                        Now you have to add this shortCode to your WP site where you want the contact form to appear.<br>
                        The shortCode: <strong>[ip1_contact_form]</strong><br>
                        And then you can start fil the settings fields as you need.
                    </p>
                    <h2>CSS Style Classes</h2>
                    <p style="margin-left: 10px;">
                        ip1-contact-form-body<br>
                        ip1-contact-form-container<br>
                        ip1-contact-form-main-label<br>
                        ip1-contact-form-container<br>
                        ip1-contact-form-input-group<br>
                        ip1-contact-form-required-field<br>
                        ip1-contact-form-properties-label<br>
                        ip1-contact-form-properties-input<br>
                        ip1-contact-form-labels-header<br>
                        ip1-contact-form-labels-label<br>
                        ip1-contact-form-labels-checkbox<br>
                        ip1-contact-form-submit-button
                    </p>
                    <h4>Link to example CSS <a href="https://www.ip1sms.com/wordpress/templates" target="_blank">Here</a></h4>
                </div>
            </td>
        </tr>
    </table>
<?php
}

function ip1_cf_trim_array($array)
{
    $new_array = [];
    foreach ($array as $item) {
        if (trim($item) !== "") {
            array_push($new_array, trim($item));
        }
    }
    return $new_array;
}

function ip1_cf_validate_phone_number($number, $region)
{
    $obj = (object)array('DefaultRegion' => $region, 'PhoneNumbers' => [$number]);

    $response = wp_remote_post('https://api.ip1sms.com/api/phonenumber/lookup', array(
        'headers' => array(
            'Content-Type' => "application/json",
        ),
        'body' => json_encode($obj)
    ));

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    return $data->phoneNumbers[0];
}
