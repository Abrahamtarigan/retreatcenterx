<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Get previous link URL from CI_Pagination object
 *
 * @param  object  $pagination  CI_Pagination object
 * @return string
 */
function pagination_prev_link($pagination)
{
       $prev_link = $pagination->prev_link;

       if ($prev_link !== '') {
              return $prev_link;
       }

       return '#';
}

/**
 * Get next link URL from CI_Pagination object
 *
 * @param  object  $pagination  CI_Pagination object
 * @return string
 */
function pagination_next_link($pagination)
{
       $next_link = $pagination->next_link;

       if ($next_link !== '') {
              return $next_link;
       }

       return '#';
}
