<?php
/**
 * @file
 * Contains \Drupal\herosearch\Plugin\Block\herosearchBlock.
 */
namespace Drupal\herosearch\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Block\BlockPluginInterface;

//Use if this Block is configurable
use Drupal\Core\Form\FormStateInterface;

//Use if this block will do an http request
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Provides a 'herosearch' block.
 *
 * @Block(
 *   id = "herosearch_block",
 *   admin_label = @Translation("Hero Search Block"),
 *   category = @Translation("EXLabs Custom Website")
 * )
 */
class herosearchBlock extends BlockBase implements BlockPluginInterface {
  /**
   * {@inheritdoc}
   */ 
    public function build() {

        \Drupal::service('page_cache_kill_switch')->trigger();
        //$quadServices = new QuadservicesController;

        $data_array = array();

	    return array(
        '#theme' => 'herosearch',
        '#data_array' => $data_array,
        '#cache' => ['max-age' => 0,],
		  	'#attached' => array(
        		'library' => array(
          			'herosearch/herosearch',
	        	),
        	),

	    );

  	}

}