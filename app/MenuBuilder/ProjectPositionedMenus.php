<?php
/*
17.12.2019
ProjectPositionedMenus.php
*/

namespace App\MenuBuilder;

class ProjectPositionedMenus{

    private static function renderDropdown($data, $prefixClass){
        if(array_key_exists('slug', $data) && $data['slug'] === 'dropdown'){
            echo '<li class="' . $prefixClass . 'nav-item dropdown px-3">';
            echo '<a class="' . $prefixClass . 'nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">';
            if($data['hasIcon'] === true && $data['iconType'] === 'coreui'){
                echo '<i class="' . $data['icon'] . ' ' . $prefixClass . 'nav-icon"></i>';    
            }
            echo $data['name'] . '</a>';
            echo '<div class="dropdown-menu">';
            self::renderDropdown( $data['elements'], $prefixClass );
            echo '</div></li>';
        }else{
            for($i = 0; $i < count($data); $i++){
                if( $data[$i]['slug'] === 'link' ){
                    echo '<a class="' . $prefixClass . 'nav-link dropdown-item" href="' . env('APP_URL', '') . $data[$i]['href'] . '">';
                    echo '<span class="' . $prefixClass . 'nav-icon"></span>' . $data[$i]['name'] . '</a>';
                }elseif( $data[$i]['slug'] === 'dropdown' ){
                    self::renderDropdown( $data[$i], $prefixClass );
                }
            }
        }
    }

    /**
     * Render menu nav
     * @param  $data - array, result of GetSidebarMenu->get function
     * @param  $prefixClass - prefix to be placed before detailed classes
     * @param  $navClass - class to be placed in nav 
     */
    public static function render($data){

        echo "Current Project: &nbsp;";
        echo "<form action=\"" . route('projects.current') . "\" method=\"POST\">";
        echo "<input type=\"hidden\" name=\"_token\" value=\"". csrf_token() ."\" />";

        echo " <select name=\"current_project\" id=\"current_project\" class=\"form-control\" onchange=\"this.form.submit()\">";
        if (empty($data)) {
            echo "  <option value=\"No projects registered\">No projects registered</option>";
        } else {
            foreach($data as $key => $name) {
                $title = $name["title"];
                $current = $name["current"];
                (!$current) ? $default = "" : $default = "selected=\"selected\"";
                echo "  <option value=\"$key\" $default>$title</option>";
            }
        }
        echo "</select>";
        echo " </form>";
    }

}