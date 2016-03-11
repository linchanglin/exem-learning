<?php

namespace App\Jobs;

use App\Department;
use App\QuestionBank;
use Illuminate\Contracts\Bus\SelfHandling;

class QuestionBankFormFields extends Job implements SelfHandling
{
    protected $id;

    protected $fieldList = [
        'questionBank' => '',
        'departments' => [],
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fields = $this->fieldList;

        if ($this->id) {
            $fields = $this->fieldsFromModel($this->id,$fields);
        }

        foreach ($fields as $fieldName => $fieldValue) {
            $fields[$fieldName] = old($fieldName,$fieldValue);
        }

        return array_merge(
            $fields,
            ['allDepartments' => Department::lists('department')->all()]
        );
    }

    protected function fieldsFromModel($id, array $fields)
    {
        $questionBank = QuestionBank::findOrFail($id);

        $fieldNames = array_keys(array_except($fields,['departments']));

        foreach ($fieldNames as $field) {
            $fields[$field] = $questionBank->{$field};
        }

        $fields['departments'] = $questionBank->departments()->lists('department')->all();

        return $fields;
    }
}






















