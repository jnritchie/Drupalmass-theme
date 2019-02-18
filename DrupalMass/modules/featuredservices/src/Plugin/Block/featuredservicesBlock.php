<?php
/**
 * @file
 * Contains \Drupal\featuredservices\Plugin\Block\featuredservicesBlock.
 */
namespace Drupal\featuredservices\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Block\BlockPluginInterface;

//Use if this Block is configurable
use Drupal\Core\Form\FormStateInterface;

//Use if this block will do an http request
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Provides a 'featuredservices' block.
 *
 * @Block(
 *   id = "featuredservices_block",
 *   admin_label = @Translation("Featured Services Block"),
 *   category = @Translation("EXLabs Custom Website")
 * )
 */
class featuredservicesBlock extends BlockBase implements BlockPluginInterface {
  /**
   * {@inheritdoc}
   */ 
    public function build() {

        \Drupal::service('page_cache_kill_switch')->trigger();
        //$quadServices = new QuadservicesController;

        $data_array = array();

	    return array(
        '#theme' => 'featuredservices',
        '#data_array' => $data_array,
        '#cache' => ['max-age' => 0,],
		  	'#attached' => array(
        		'library' => array(
          			'featuredservices/featuredservices',
	        	),
        	),

	    );

  	}

}