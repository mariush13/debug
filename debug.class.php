<div style="position: absolute; width: 250px; right: 0px; top: 0px; background-color: white; font-family: Courier; font-size: 11px; line-height: 5px;">
<p style="font-weight: bold">PHP Output</p><br>
    <?php
    
    $predefined = array( 'stdClass','Exception','__PHP_Incomplete_Class','php_user_filter','Directory','ReflectionException','Reflection','ReflectionFunction',
                        'ReflectionParameter','ReflectionMethod','ReflectionClass','ReflectionObject','ReflectionProperty','ReflectionExtension','SQLiteDatabase',
                        'SQLiteResult','SQLiteUnbuffered','SQLiteException','RecursiveIteratorIterator','FilterIterator','ParentIterator','LimitIterator',
                        'CachingIterator','CachingRecursiveIterator','ArrayObject','ArrayIterator','DirectoryIterator','RecursiveDirectoryIterator','SimpleXMLElement',
                        'SimpleXMLIterator','DOMException','DOMStringList', 'DOMNameList','DOMImplementationList','DOMImplementationSource','DOMImplementation',
                        'DOMNode','DOMNameSpaceNode','DOMDocumentFragment','DOMDocument','DOMNodeList','DOMNamedNodeMap','DOMCharacterData','DOMAttr','DOMElement',
                        'DOMText','DOMComment','DOMTypeinfo','DOMUserDataHandler','DOMDomError','DOMErrorHandler','DOMLocator','DOMConfiguration','DOMCdataSection',
                        'DOMDocumentType','DOMNotation','DOMEntity','DOMEntityReference','DOMProcessingInstruction','DOMStringExtend','DOMXPath','XSLTProcessor',
                        'ErrorException','Closure','DateTime','DateTimeZone','DateInterval','DatePeriod','LibXMLError','ReflectionFunctionAbstract','LogicException',
                        'BadFunctionCallException','BadMethodCallException','DomainException','InvalidArgumentException','LengthException','OutOfRangeException',
                        'RuntimeException','OutOfBoundsException','OverflowException','RangeException','UnderflowException','UnexpectedValueException','IteratorIterator',
                        'RecursiveFilterIterator','RecursiveCachingIterator','NoRewindIterator','AppendIterator','InfiniteIterator','RegexIterator','RecursiveRegexIterator',
                        'EmptyIterator','RecursiveTreeIterator','RecursiveArrayIterator','SplFileInfo','FilesystemIterator','GlobIterator','SplFileObject','SplTempFileObject',
                        'SplDoublyLinkedList','SplQueue','SplStack','SplHeap','SplMinHeap','SplMaxHeap','SplPriorityQueue','SplFixedArray','SplObjectStorage','MultipleIterator',
                        'APCIterator','PDOException','PDO','PDOStatement','PDORow','XMLWriter','mysqli_sql_exception','mysqli_driver','mysqli','mysqli_warning','mysqli_result',
                        'mysqli_stmt','SoapClient','SoapVar','SoapServer','SoapFault','SoapParam','SoapHeader','finfo','SQLite3','SQLite3Stmt','SQLite3Result','PDFlibException',
                        'PDFlib','PharException','Phar','PharData','PharFileInfo','ZipArchive','XMLReader','Collator','NumberFormatter','Normalizer','Locale','MessageFormatter',
                        'IntlDateFormatter','ResourceBundle');
    
    $classes = get_declared_classes();
    echo '<p style="font-weight: bold;" onclick="obj = document.getElementById(\'user\'); if (obj.style.display == \'block\'){ obj.style.display = \'none\'; } else { obj.style.display = \'block\'; }">User classes</p><br><div id="user" style="display: none;">'."\n";
    foreach ($classes as $class){
        if (!in_array($class,$predefined)){
            echo '<p style="font-weight: bold; margin-left: 10px;" onclick="obj = document.getElementById(\''.$class.'\'); if (obj.style.display == \'block\'){ obj.style.display = \'none\'; } else { obj.style.display = \'block\'; }">'.$class.'</p>'."\n";
            echo '<div id="'.$class.'" style="display: none;">'."\n";
            $variables = get_class_vars($class);
            foreach ($variables as $name => $value){
                $cl = new $class;
                echo '<p style="margin-left: 20px;">$'.$name.' : '.print_r($cl->$name, true).'</p>'."\n";
                unset($cl);
            }
            $methods = get_class_methods($class);
            foreach ($methods as $method){
                echo '<p style="margin-left: 20px;">'.$method.'()</p>'."\n";
            }
            echo '<br></div>'."\n";
        }      
    }
    echo '</div><br><p style="font-weight: bold;" onclick="obj = document.getElementById(\'predefined\'); if (obj.style.display == \'block\'){ obj.style.display = \'none\'; } else { obj.style.display = \'block\'; }">Predefined classes</p><br><div id="predefined" style="display: none;">'."\n";
    foreach ($predefined as $class){
            echo '<p style="font-weight: bold; margin-left: 10px;" onclick="obj = document.getElementById(\''.$class.'\'); if (obj.style.display == \'block\'){ obj.style.display = \'none\'; } else { obj.style.display = \'block\'; }">'.$class.'</p>'."\n";
            echo '<div id="'.$class.'" style="display: none;">'."\n";
            $variables = get_class_vars($class);
            foreach ($variables as $name => $value){
                echo '<p style="font-style: italic; margin-left: 20px;">$'.$name.' : '.$value.'</p>'."\n";
            }
            $methods = get_class_methods($class);
            foreach ($methods as $method){
                echo '<p style="margin-left: 20px;">'.$method.'()</p>'."\n";
            }
            echo '</div>'."\n";     
    }
    echo '</div>';
    ?>
</div>