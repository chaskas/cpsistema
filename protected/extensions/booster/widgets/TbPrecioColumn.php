<?php
/**
 *## TbToggleColumn class file
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 */

/**
 *## TbToggleColumn widget
 *
 * Renders a button to toggle values of a column
 *
 * Modified version of jToggle column of Nikola Trifunović <http://www.trifunovic.me/>
 *
 * @package booster.widgets.grids.columns
 */
class TbPrecioColumn extends TbDataColumn {

	public $value;

	/**
	 * @var string the attribute name of the data model. Used for column sorting, filtering and to render the corresponding
	 * attribute value in each data cell. If {@link value} is specified it will be used to rendered the data cell instead of the attribute value.
	 * @see value
	 * @see sortable
	 */
	public $name;

	/**
	 * @var array the HTML options for the data cell tags.
	 */
	public $htmlOptions = array('class' => 'toggle-column');

	/**
	 * @var array the HTML options for the header cell tag.
	 */
	public $headerHtmlOptions = array('class' => 'toggle-column');

	/**
	 * @var array the HTML options for the footer cell tag.
	 */
	public $footerHtmlOptions = array('class' => 'toggle-column');

	/**
	 * @var string the label for the toggle button. Defaults to "Check".
	 * Note that the label will not be HTML-encoded when rendering.
	 */
	public $checkedButtonLabel;

	/**
	 * @var string the label for the toggle button. Defaults to "Uncheck".
	 * Note that the label will not be HTML-encoded when rendering.
	 */
	public $uncheckedButtonLabel;

	/**
	 * @var string the label for the NULL value toggle button. Defaults to "Not Set".
	 * Note that the label will not be HTML-encoded when rendering.
	 */
	public $emptyButtonLabel;

	/**
	 * @var string the glyph icon toggle button "checked" state.
	 * You may set this property to be false to render a text link instead.
	 */
	public $checkedIcon = 'ok-circle';

	/**
	 * @var string the glyph icon toggle button "unchecked" state.
	 * You may set this property to be false to render a text link instead.
	 */
	public $uncheckedIcon = 'remove-sign';

	/**
	 * @var string the glyph icon toggle button "empty" state (example for null value)
	 */
	public $emptyIcon = 'question-sign';

	/**
	 * @var boolean display button with text or only icon with label tooltip
	 */
	public $displayText = false;

	/**
	 * @var boolean whether the column is sortable. If so, the header cell will contain a link that may trigger the sorting.
	 * Defaults to true. Note that if {@link name} is not set, or if {@link name} is not allowed by {@link CSort},
	 * this property will be treated as false.
	 * @see name
	 */
	public $sortable = true;

	/**
	 * @var mixed the HTML code representing a filter input (eg a text field, a dropdown list)
	 * that is used for this data column. This property is effective only when
	 * {@link CGridView::filter} is set.
	 * If this property is not set, a text field will be generated as the filter input;
	 * If this property is an array, a dropdown list will be generated that uses this property value as
	 * the list options.
	 * If you don't want a filter for this data column, set this value to false.
	 * @since 1.1.1
	 */
	public $filter;

	/**
	 * @var string Name of the action to call and toggle values
	 * @see bootstrap.action.TbToggleAction for an easy way to use with your controller
	 */
	public $precioAction = 'PreciosDesc/index';

	/**
	 * @var string a javascript function that will be invoked after the toggle ajax call.
	 *
	 * The function signature is <code>function(data)</code>
	 * <ul>
	 * <li><code>success</code> status of the ajax call, true if the ajax call was successful, false if the ajax call failed.
	 * <li><code>data</code> the data returned by the server in case of a successful call or XHR object in case of error.
	 * </ul>
	 * Note that if success is true it does not mean that the delete was successful, it only means that the ajax call was successful.
	 *
	 * Example:
	 * <pre>
	 *  array(
	 *     class'=>'TbToggleColumn',
	 *     'afterToggle'=>'function(success,data){ if (success) alert("Toggled successfuly"); }',
	 *  ),
	 * </pre>
	 */
	public $afterToggle;

	/**
	 * @var string suffix substituted to a name class of the tag <a>
	 */
	public $uniqueClassSuffix = '';

	/**
	 * @var array the configuration for toggle button.
	 */
	protected $button = array();

	/**
	 * Initializes the column.
	 * This method registers necessary client script for the button column.
	 */
	public function init()
	{
		if ($this->name === null) {
			throw new CException(Yii::t(
				'zii',
				'"{attribute}" attribute cannot be empty.',
				array('{attribute}' => "name")
			));
		}

		$this->initButton();
		$this->registerClientScript();
	}

	/**
	 * Initializes the default buttons (toggle).
	 */
	protected function initButton()
	{


	}

	/**
	 * Registers the client scripts for the button column.
	 */
	protected function registerClientScript()
	{
	}

	/**
	 * Renders the data cell content.
	 * This method renders the view, update and toggle buttons in the data cell.
	 *
	 * @param integer $row the row number (zero-based)
	 * @param mixed $data the data associated with the row
	 */
	protected function renderDataCellContent($row, $data) {
		

       $dcto = Productos::model()->TieneDescuentos($data->primaryKey);

        if(!empty($dcto)) {

          //  foreach ($dcto as $des) {

           //     if ($des->TipoDesc_id=1){

                    echo  CHtml::link( '<i class="fa fa-ticket"></i>',array('PreciosDesc/index',
                        'id'=>$data->primaryKey), array('data-toggle' =>'tooltip', 'title' => '', 'data-original-title' => 'Manejar Precios'));

           //     }


        //    }
        } else {

            echo  CHtml::link( '<i class="fa fa-usd" style="font-size: 12px;"></i> <strong>'. number_format ( $data->PrecioNormal, 0, "," ,"." ).'</strong>',array('PreciosDesc/index',
                'id'=>$data->primaryKey), array('data-toggle' =>'tooltip', 'title' => '', 'data-original-title' => 'Crear Descuentos O economia de escala'));



        }





        //<i class="fa fa-cubes"></i>
        //<i class="fa fa-ticket"></i>
        //<i class="fa fa-history"></i>

		//	echo CHtml::link( $button['icon'],'sadasd','asdasdsa');

	}

}
