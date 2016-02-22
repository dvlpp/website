<?php

namespace App\Sharp;

use App\Sharp\Web\SharpProjetRepository;
use App\Sharp\Web\SharpProjetValidator;
use App\Sharp\Web\SharpTechnoRepository;
use Dvlpp\Sharp\Config\FormFields\ListField\SharpListFormFieldConfig;
use Dvlpp\Sharp\Config\FormFields\ListField\SharpListItemFormTemplateConfig;
use Dvlpp\Sharp\Config\FormFields\SharpCheckFormFieldConfig;
use Dvlpp\Sharp\Config\FormFields\SharpFileFormFieldConfig;
use Dvlpp\Sharp\Config\FormFields\SharpMarkdownFormFieldConfig;
use Dvlpp\Sharp\Config\FormFields\SharpPivotFormFieldConfig;
use Dvlpp\Sharp\Config\FormFields\SharpTextareaFormFieldConfig;
use Dvlpp\Sharp\Config\FormFields\SharpTextFormFieldConfig;
use Dvlpp\Sharp\Config\SharpEntityConfig;
use Dvlpp\Sharp\Config\SharpEntityStateIndicator;
use Dvlpp\Sharp\Config\SharpFormTemplateColumnConfig;
use Dvlpp\Sharp\Config\SharpListTemplateColumnConfig;

class SharpEntityConfigWebProjet extends SharpEntityConfig
{

    protected $label = "projet";
    protected $icon = "glass";
    protected $plural = "projets";
    protected $repository = SharpProjetRepository::class;
    protected $validator = SharpProjetValidator::class;
    protected $duplicable = true;
    protected $searchable = true;
    protected $pageable = false;
    protected $creatable = true;
    protected $reorderable = true;

    /**
     * Build the list template columns using addListColumn()
     *
     * @return void
     */
    public function buildListTemplate()
    {
        $this->addListColumn(
            SharpListTemplateColumnConfig::create("titre")
                ->setSize(3)
                ->setHeading("Titre")
        );

        $this->addListColumn(
            SharpListTemplateColumnConfig::create("soustitre")
                ->setSize(3)
                ->setHeading("Sous-titre")
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
            SharpTextFormFieldConfig::create("titre")
                ->setLabel("Titre")
        );

        $this->addFormField(
            SharpTextFormFieldConfig::create("soustitre")
                ->setLabel("Sous-titre")
        );

        $this->addFormField(
            SharpTextFormFieldConfig::create("slug")
                ->setLabel("Slug")
        );

        $this->addFormField(
            SharpTextFormFieldConfig::create("url")
                ->setLabel("URL du projet")
        );

        $this->addFormField(
            SharpMarkdownFormFieldConfig::create("texte")
                ->setLabel("Texte")
                ->showToolbar(true)
        );

        $this->addFormField(
            SharpCheckFormFieldConfig::create("is_open_source")
                ->setText("Projet Open-source")
        );

        $this->addFormField(
            SharpPivotFormFieldConfig::create("technos", SharpTechnoRepository::class)
                ->setLabel("Technologies")
                ->setAddable(true)
                ->setSortable(true)
                ->setOrderAttribute("ordre")
                ->setCreateAttribute("nom")
        );

        $this->addFormField(
            SharpListFormFieldConfig::create("screenshots")
                ->setLabel("Screenshots")
                ->setSortable(true)->setOrderAttribute("ordre")
                ->setAddable(true)->setAddButtonText("Ajouter un screenshot")
                ->setRemovable(true)->setRemoveButtonText("Supprimer")
                ->addItemFormField(
                    SharpFileFormFieldConfig::create("fichier")
                        ->setFileFilterImages()
                        ->setMaxFileSize(5)
                        ->setThumbnail("100x100")
                        ->addGeneratedThumbnail("600x"))
                ->addItemFormField(
                    SharpTextFormFieldConfig::create("tag")
                        ->addAttribute("placeholder", "Tag"))
                ->addItemFormField(
                    SharpTextareaFormFieldConfig::create("legende")
                        ->setRows(3))
                ->setItemFormTemplate(
                    SharpListItemFormTemplateConfig::create()
                        ->addField("fichier")
                        ->addField("tag")
                        ->addField("legende")
                )
        );

        $this->addFormTemplateColumn(
            SharpFormTemplateColumnConfig::create(7)
                ->addField("titre")
                ->addField("soustitre")
                ->addField(["slug:5", "url:7"])
                ->addField("technos")
                ->addField("is_open_source")

        )->addFormTemplateColumn(
            SharpFormTemplateColumnConfig::create(5)
                ->addField("texte")
                ->addField("screenshots")
        );
    }

    public function buildStateIndicator()
    {
        $this->setStateIndicator(SharpEntityStateIndicator::create("etat")
            ->addState(3, "En ligne", "green")
            ->addState(2, "Admin seulement", "orange")
            ->addState(1, "Masqué", "gray")
        );
    }
}