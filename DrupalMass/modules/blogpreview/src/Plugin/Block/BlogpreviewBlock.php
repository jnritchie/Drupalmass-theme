<?php
/**
 * @file
 * Contains \Drupal\blogpreview\Plugin\Block\BlogpreviewBlock.
 */
namespace Drupal\blogpreview\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\Language;

/**
 * Provides a 'blogpreview' block.
 *
 * @Block(
 *   id = "blogpreview_block",
 *   admin_label = @Translation("Blog Preview Grid"),
 *   category = @Translation("EXLabs Custom Module")
 * )
 */
class BlogpreviewBlock extends BlockBase implements BlockPluginInterface {
  /**
   * {@inheritdoc}
   */ 
    public function build() {

      \Drupal::service('page_cache_kill_switch')->trigger();
      
      //Query the database to obtain the testimonial records, make an array and return it.
      $query = \Drupal::entityQuery('node')
          ->condition('type', 'article')
          ->sort('created', 'DESC');
      $nids = $query->execute();

      $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);

      $cc = 0;
      foreach ($nodes as $key => $node) {

		$node->language = isset($node->language) ? $node->language : Language::LANGCODE_NOT_SPECIFIED;

		$data_array[$cc]['title'] = $node->title->value;
		$data_array[$cc]['body']  = $node->body->view('teaser');
		$data_array[$cc]['published'] = date("j-M-Y", $node->created->value);
		
		$link = \Drupal::service('path.alias_manager')->getAliasByPath('/node/'.$node->nid->value);
		$data_array[$cc]['link'] = $link;

		$imagefield = $node->get('field_image');

		if($imagefield->isEmpty()) {
    		$data_array[$cc]['image'] = "/themes/massgovdemo/imgs/exotic-flora.jpg";
    	} else {
    		$data_array[$cc]['image'] = entity_load('image_style', 'blog_post')->buildUrl($imagefield->entity->getFileUri());
    	}
        $cc++;
      }


	    return array(
        '#theme' => 'blogpreview',
        '#data_array' => $data_array,
       	'#cache' => ['max-age' => 0,],
		  	'#attached' => array(
        		'library' => array(
          			'blogpreview/blogpreview',
	        	),
        	),

	    );

  	}

}