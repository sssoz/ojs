<?php
/**
 * @file classes/components/form/context/LicenseForm.inc.php
 *
 * Copyright (c) 2014-2019 Simon Fraser University
 * Copyright (c) 2000-2019 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class LicenseForm
 * @ingroup classes_controllers_form
 *
 * @brief Add OJS-specific details to the license settings forms
 */
namespace APP\components\forms\context;
use \PKP\components\forms\context\PKPLicenseForm;
use \PKP\components\forms\FieldOptions;

class LicenseForm extends PKPLicenseForm {
	/** @copydoc FormComponent::$id */
	public $id = FORM_LICENSE;

	/** @copydoc FormComponent::$method */
	public $method = 'PUT';

	/**
	 * @copydoc PKPLicenseForm::__construct()
	 */
	public function __construct($action, $locales, $context) {
		parent::__construct($action, $locales, $context);

		$this->addField(new FieldOptions('copyrightYearBasis', [
				'label' => __('submission.copyrightYear'),
				'description' => __('manager.distribution.copyrightYearBasis.description'),
				'type' => 'radio',
				'options' => [
					['value' => 'issue', 'label' => __('manager.distribution.copyrightYearBasis.issue')],
					['value' => 'submission', 'label' => __('manager.distribution.copyrightYearBasis.submission')],
				],
				'value' => $context->getData('copyrightYearBasis'),
			]), [FIELD_POSITION_AFTER, 'licenseUrl']);
	}
}
