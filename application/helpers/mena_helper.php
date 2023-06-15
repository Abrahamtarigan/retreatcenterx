<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('userNik')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];
        $userAccessMenu = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
            //'submenu_id' => $submenu_id
        ]);


        if ($userAccessMenu->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}


function check_access_menu($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    //$ci->db->where('submenu_id', $submenu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function check_access_sub_menu($role_id, $submenu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('submenu_id', $submenu_id);
    $result = $ci->db->get('user_access_sub_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
