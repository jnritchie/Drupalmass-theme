<?php
/**
 * @file
 * Contains \Drupal\footer\Plugin\Block\FooterBlock.
 */
namespace Drupal\footer\Plugin\Block;
use Drupal\Core\Menu\MenuTreeParameters;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;


/**
 * Provides a 'footer' block.
 *
 * @Block(
 *   id = "footer_block",
 *   admin_label = @Translation("Footer"),
 *   category = @Translation("EXLabs Custom Module")
 * )
 */
class FooterBlock extends BlockBase implements BlockPluginInterface {
  /**
   * {@inheritdoc}
   */ 
    public function build() {

      $menu_tree_parameters = new MenuTreeParameters();
      $tree = \Drupal::menuTree()->load('footer', $menu_tree_parameters); 

      $cc = 0;
      foreach($tree as $menu){ 
        $title     = $menu->link->getTitle();
        $urlObject = $menu->link->getUrlObject();
        $url       = $urlObject->toString();
        $weight    = $menu->link->getWeight();
        $enabled   = $menu->link->isEnabled();

        if($enabled) {
          $menu_array[$cc]['title']    = $title;
          $menu_array[$cc]['url']      = $url;
          $menu_array[$cc]['weight']   = $weight;
          $cc++;
        }

      }

      usort($menu_array, function($a, $b) {
          return $a['weight'] - $b['weight'];
      });

	    return array(
        '#theme' => 'footer',
        '#menu_array' => $menu_array,
		  	'#attached' => array(
        		'library' => array(
          			'footer/footer',
	        	),
        	),

	    );

  	}

}