<?php

if (class_exists('acf_field')) {
    class acf_field_posttype_select extends acf_field {

        public function __construct() {
            $custom_post_types = $this->get_custom_post_types();

            if (empty($custom_post_types)) {
                // If there are no custom post types, do not register the field.
                return;
            }

            $this->name = 'posttype_select';
            $this->label = __('Post Type Select', 'larsvd');
            $this->category = 'choice';
            $this->defaults = array(
                'multiple'      => 0,
                'allow_null'    => 0,
                'default_value' => '',
                'placeholder'   => '',
                'disabled'      => 0,
                'readonly'      => 0,
            );
            $this->l10n = array(
                'error' => __('Error! Please enter a higher value', 'larsvd'),
            );

            parent::__construct();
        }

        public function render_field_settings($field) {
            acf_render_field_setting($field, array(
                'label' => __('Default Value', 'acf'),
                'instructions' => __('Enter each default value on a new line', 'acf'),
                'type' => 'textarea',
                'name' => 'default_value'
            ));

            acf_render_field_setting($field, array(
                'label' => __('Allow Null?', 'acf'),
                'instructions' => '',
                'type' => 'radio',
                'name' => 'allow_null',
                'choices' => array(
                    1 => __('Yes', 'acf'),
                    0 => __('No', 'acf')
                ),
                'layout' => 'horizontal'
            ));

            acf_render_field_setting($field, array(
                'label'         => __('Select multiple values?', 'acf'),
                'instructions'  => '',
                'type'          => 'radio',
                'name'          => 'multiple',
                'choices'       => array(
                    1               => __("Yes", 'acf'),
                    0               => __("No", 'acf'),
                ),
                'layout'    =>  'horizontal',
            ));
        }

        public function render_field($field) {
            $field['value'] = acf_get_array($field['value'], false);

            if (empty($field['value'])) {
                $field['value'][''] = '';
            }

            if (empty($field['placeholder'])) {
                $field['placeholder'] = __("Select", 'acf');
            }

            $atts = array(
                'id'                => $field['id'],
                'class'             => $field['class'],
                'name'              => $field['name'],
                'data-multiple'     => $field['multiple'],
                'data-placeholder'  => $field['placeholder'],
                'data-allow_null'   => $field['allow_null']
            );

            if ($field['multiple']) {
                $atts['multiple'] = 'multiple';
                $atts['size'] = 5;
                $atts['name'] .= '[]';
            }

            foreach (array('readonly', 'disabled') as $k) {
                if (!empty($field[$k])) {
                    $atts[$k] = $k;
                }
            }

            $els = array();
            $posttypes = $this->post_type_options();

            foreach ($posttypes as $pt) {
                $els[] = array(
                    'type' => 'option',
                    'value' => $pt['value'],
                    'label' => $pt['label'],
                    'selected' => in_array($pt['value'], $field['value'])
                );
            }

            if ($field['allow_null']) {
                array_unshift($els, array(
                    'type' => 'option',
                    'value' => '',
                    'label' => '- ' . $field['placeholder'] . ' -'
                ));
            }

            echo '<select ' . acf_esc_attr($atts) . '>';

            if (!empty($els)) {
                foreach ($els as $el) {
                    $type = acf_extract_var($el, 'type');

                    if ($type == 'option') {
                        $label = acf_extract_var($el, 'label');

                        if (acf_extract_var($el, 'selected')) {
                            $el['selected'] = 'selected';
                        }

                        echo '<option ' . acf_esc_attr($el) . '>' . $label . '</option>';
                    } else {
                        echo '<' . $type . ' ' . acf_esc_attr($el) . '>';
                    }
                }
            }
            echo '</select>';
        }

        private function post_type_options() {
            $post_types = $this->get_custom_post_types();
            $output = array();

            foreach ($post_types as $post_type) {
                $output[] = array(
                    'value' => $post_type->name,
                    'label' => $post_type->label
                );
            }
            return $output;
        }

        private function get_custom_post_types() {
            $args = array('public' => true, '_builtin' => false);
            return get_post_types($args, 'objects');
        }
    }

    new acf_field_posttype_select();
}