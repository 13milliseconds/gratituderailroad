<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use WP_Query;

class portfolio extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Portfolio';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Portfolio block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'formatting';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => false,
        'multiple' => true,
        'jsx' => true,
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'portfolio' => $this->getPortfolio(),
            'categories' => $this->getCategories(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $portfolio = new FieldsBuilder('portfolio');

        $portfolio
            ->addRepeater('items')
                ->addText('item')
            ->endRepeater();

        return $portfolio->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    // Grab all portfolio items
    public function getPortfolio()
    {
        $args = array(
            'post_type' => 'portfolio',
            'showposts' => -1,
            'post_status' => ['publish'],
            'orderby' => 'title',
            'order' => 'asc'
	    );
	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }
    
    public function getCategories()
    {
        $cats = get_terms('portfolio-category');
	    return $cats;
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
