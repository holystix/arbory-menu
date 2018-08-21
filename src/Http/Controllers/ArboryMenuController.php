<?php

namespace CubeAgency\ArboryMenu\Http\Controllers;

use Arbory\Base\Admin\Form;
use Arbory\Base\Admin\Form\Fields\HasMany;
use Arbory\Base\Admin\Form\Fields\ObjectRelation;
use Arbory\Base\Admin\Form\Fields\Text;
use Arbory\Base\Admin\Form\FieldSet;
use Arbory\Base\Admin\Grid;
use Arbory\Base\Admin\Traits\Crudify;
use Arbory\Base\Nodes\Node;
use CubeAgency\ArboryMenu\Models\ArboryMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Controller;
use Waavi\Translation\Repositories\LanguageRepository;

class ArboryMenuController extends Controller
{
    use Crudify;

    /**
     * @var string
     */
    protected $resource = ArboryMenu::class;

    /**
     * @var LanguageRepository
     */
    protected $repository;

    /**
     * @param LanguageRepository $repository
     */
    public function __construct(
        LanguageRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * @param Model $model
     * @return Form
     */
    protected function form( Model $model )
    {
        $form = $this->module()->form( $model, function ( Form $form ) {
            $form->addField( new Text( 'name' ) )->rules( 'required' );

            $form->addField( new Form\Fields\Sortable( 'position',
                new HasMany( "items", function ( FieldSet $fieldSet ) {
                    $fieldSet->add( new ObjectRelation( 'node', Node::class, 1 ) );
                    $fieldSet->add( new Text( 'name' ) )->rules( 'required_without:resource.items.*.node.related_id' );
                    $fieldSet->add( new Text( 'link' ) )->rules( 'nullable|url|required_without:resource.items.*.node.related_id' )->setLabel( 'Link (overrides node field value)' );
                } ) ) );
        } );

        return $form;
    }

    /**
     * @return Grid
     */
    public function grid()
    {
        $grid = $this->module()->grid( $this->resource(), function ( Grid $grid ) {
            $grid->column( 'name' );
        } );

        return $grid;
    }

}
