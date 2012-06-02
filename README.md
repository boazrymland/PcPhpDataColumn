PcPhpDataColumn
===============

# General

While developing a table using CGridView, I needed to run a code snippet for each row (and for each data object being handled/rendered in that row). I couldn't use CDataColumn since the PHP code CDataColumn expect is simple and would need to be run when prefixed by 'return...'. 
The PcPhpDataColumn class provided by this extension is an 'extension' (OO term) of CDataColumn and overwrites its evaluateExpression() method to allow running of more complex code snippets. 

Yii extension that provides a 'data column' with flexible PHP code running capability.

## Requirements

- Not much. Tested with Yii v1.1.10. 

## Usage

- Unpack this extension. Put the single result file - PcPhpDataColumn.php - and put it under /protected/components/
- This class is to be used exactly as CDataColumn is to be used. Please see the documentation [here](http://www.yiiframework.com/doc/api/1.1/CDataColumn) for more information on this and specifically [this resource](http://www.yiiframework.com/doc/api/1.1/CDataColumn#value-detail) for information on how exactly the code snippet should be run, what variables exists in its context when its run, etc. Example usage in a view file:

```php
$this->widget('zii.widgets.grid.CGridView', array(
  'id' => 'my-id',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
    // other columns...
    array(
  	  'class' => 'PcPhpDataColumn',
  		'name' => 'table_column_name',
	  	'header' => 'Column header text',
  		'value' => '$a = Yii::app()->someComp->someCalc($data); $b = new SomeClass($a); return $b->getSomeData();',
	  ),
  ),
));
```

- IMPORTANT: make sure that your code "return"s a value. This value is the value that will be considered as the value of the table cell.                                                                       


## Resources

- [CDataColumn documentation](http://www.yiiframework.com/doc/api/1.1/CDataColumn). Please refer to this resource for complete information on CDataColumn (which this extension extends).
