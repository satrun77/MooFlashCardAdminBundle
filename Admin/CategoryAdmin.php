<?php

/*
 * This file is part of the Moo\FlashCardAdminBundle package.
 *
 * (c) Mohamed Alsharaf <mohamed.alsharaf@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Moo\FlashCardAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * CategoryAdmin is the card category admin class for SonataAdminBundle.
 *
 * @author Mohamed Alsharaf <mohamed.alsharaf@gmail.com>
 */
class CategoryAdmin extends Admin
{

    /**
     * Configure the fields to be shown in create/edit forms
     *
     * @param  \Sonata\AdminBundle\Form\FormMapper $formMapper
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->with('General')
                ->add('title', 'text', array('label' => 'Category Title'))
                ->add('parent', 'entity', array('class' => 'Moo\FlashCardBundle\Entity\Category', 'required' => false))
                ->add('isActive')
                ->add('description', 'textarea', array('label' => 'Description'))
                ->with('Management')
                ->add('created', null, array('required' => false))
                ->add('updated', null, array('required' => false))
                ->end()
        ;
    }

    /**
     * Configure the fields to be shown in filter form.
     *
     * @param  \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('title', 'doctrine_orm_callback', array(
                    'callback'   => array($this, 'getSearchFilter'),
                    'field_type' => 'text'
                ))
                ->add('parent')
                ->add('isActive')
        ;
    }

    /**
     * Configure the columns in list page.
     *
     * @param  \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('title')
                ->add('parent')
                ->add('isActive', null, array('editable' => true))
                // add custom action links
                ->add('_action', 'actions', array(
                    'actions' => array(
                        'edit'   => array(),
                        'delete' => array(),
                    )
                ))
        ;
    }

    /**
     * Callback method to the filter form to search by the card title.
     *
     * @param  type    $queryBuilder
     * @param  string  $alias
     * @param  string  $field
     * @param  string  $value
     * @return boolean
     */
    public function getSearchFilter($queryBuilder, $alias, $field, $value)
    {
        if ($value['value']) {
            $exp = new \Doctrine\ORM\Query\Expr();
            $queryBuilder->andWhere($exp->like($alias . '.title', $exp->literal('%' . $value['value'] . '%')));

            return true;
        }

        return false;
    }

    public function preUpdate($category)
    {
        $category->preUpdate();
    }

    public function prePersist($category)
    {
        $category->prePersist();
    }

}
