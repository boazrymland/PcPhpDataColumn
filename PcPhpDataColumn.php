<?php
/**
 * PcPhpDataColumn class file.
 */
Yii::import('zii.widgets.grid.CDataColumn');

/**
 * PcPhpDataColumn represents a grid view column that is associated with a data attribute or expression.
 * Its a simple extension of CdataColumn and allows for a more complex PHP code snippet to be run for the
 * calculation of 'value'
 *
 */
class PcPhpDataColumn extends CDataColumn {
	public function evaluateExpression($_expression_, $_data_ = array()) {
		if (is_string($_expression_)) {
			extract($_data_);
			return eval($_expression_ . ';');
		}
		else {
			$_data_[] = $this;
			return call_user_func_array($_expression_, $_data_);
		}
	}
}
