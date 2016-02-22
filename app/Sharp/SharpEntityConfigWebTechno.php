<?php

namespace App\Sharp;

use App\Sharp\Web\SharpCategorieRepository;
use App\Sharp\Web\SharpCategorieValidator;
use App\Sharp\Web\SharpTechnoRepository;
use App\Sharp\Web\SharpTechnoValidator;
use Dvlpp\Sharp\Config\FormFields\SharpTextFormFieldConfig;
use Dvlpp\Sharp\Config\SharpEntityConfig;
use Dvlpp\Sharp\Config\SharpFormTemplateColumnConfig;
use Dvlpp\Sharp\Config\SharpListTemplateColumnConfig;

class SharpEntityConfigWebTechno extends SharpEntityConfig
{

    protected $label = "techno";
    protected $icon = "tag";
    protected $plural = "technos";
    protected $repository = SharpTechnoRepository::class;
    protected $validator = SharpTechnoValidator::class;
    protected $duplicable = true;
    protected $searchable = false;
    protected $pageable = true;
    protected $creatable = true;
    protected $reorderable = false;

    /**
     * Build the list template columns using addListColumn()
     *
     * @return void
     */
    public function buildListTemplate()
    {
        $this->addListColumn(
            SharpListTemplateColumnConfig::create("nom")
                ->setSize(10)
                ->setHeading("Nom")
        );
    }

    /**
     * Build the fields for the form, using addFormField()
     *
     * @return void
     */
    public function buildFormFields()
    {
        $this->addFormField(
            SharpTextFormFieldConfig::create("nom")
                ->setLabel("Nom")
        );

        $this->addFormTemplateColumn(
            SharpFormTemplateColumnConfig::create(7)
                ->addField("nom")

        );
    }
}