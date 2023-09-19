<?php
/**
 * Custom walker class for Tailwind CSS.
 *
 * PHP version 7
 *
 * @category WordPress
 * @package  Helsinkey
 * @author   Display Name <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://example.com/
 */

class Tailwind_Navwalker extends Walker_Nav_Menu
{
    /**
     * Starts the list before the elements are added.
     *
     * @param string $output Used to append additional content.
     * @param int    $depth  Depth of menu item.
     * @param array  $args   An array of arguments.
     *
     * @return void
     */
    public function startLvl(&$output, $depth = 0, $args = array())
    {
        $output .= '<ul class="flex">';
    }

    /**
     * Ends the list after the elements are added.
     *
     * @param string $output Used to append additional content.
     * @param int    $depth  Depth of menu item.
     * @param array  $args   An array of arguments.
     *
     * @return void
     */
    public function endLvl(&$output, $depth = 0, $args = array())
    {
        $output .= '</ul>';
    }

    /**
     * Starts the element output.
     *
     * @param string $output Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item.
     * @param array  $args   An array of arguments.
     * @param int    $id     Current item ID.
     *
     * @return void
     */
    public function startEl(
        &$output,
        $item,
        $depth = 0,
        $args = array(),
        $id = 0
    ) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;

        $output .= "<li class='mr-4 flex'>";
        $output .= '<a class="text" href="' . $permalink . '">';
        $output .= $title;
        $output .= '</a>';
        $output .= '</li>';
    }
}
