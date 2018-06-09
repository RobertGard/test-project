<?php
namespace console\controllers;

use common\models\Store;
use yii\helpers\Console;
/**
 * Description of ImportController
 *
 * @author robert
 */
class ImportController extends \yii\console\Controller{
    
    public $pathToFile; // В это сыойство сохраним путь к файлу
    public $delimiter = ','; //  Делитель
    
    //Свойство доступное из командной строки
    public function options($actionID) {
        return [
            'delimiter'
        ];
    }

    public function actionCsv($pathToFile) {
        
        //путь к файлу
        $this->pathToFile = !empty($pathToFile) ? $pathToFile : NULL;
 
        if (!file_exists($this->pathToFile) || !is_readable($this->pathToFile)) 
        {
            // Код возврата, если файл отсутствует
            $this->stdout("Указанный файл отсутствует \n", Console::BOLD);
        }
        
        $i = 1;
        
        if (($handle = fopen($this->pathToFile, 'r')) !== false) {

            while (($row = fgetcsv($handle, 1000, $this->delimiter)) !== false) {
                $model = new Store();
                
                $model->set('regionId', $row[0])
                      ->set('title', $row[1])
                      ->set('city', $row[2])
                      ->set('address', $row[3])
                      ->set('userId', $row[4]);
                
//                $model->regionId = $row[0];
//                $model->title = $row[1];
//                $model->city = $row[2];
//                $model->address = $row[3];
//                $model->userId = $row[4];
                
                if ($model->validate()) {
                    $model->save();
                } else {
                    // Код возврата в случае ошибки сохранения
                    $this->stdout("Ошибка при сохранении строки №".$i."\n", Console::BOLD);
                }
                $i++;
            }
            fclose($handle);
            
        }
        $this->stdout("Окончание работы скрипта \n", Console::BOLD);
    }
    
}
