<?php

namespace Tests\Feature\ModuleTest;




use App\Models\Module\Module;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\repositories\ModuleRepository\ModuleRepository;
use Tests\TestCase;

class ModuleTest extends TestCase
{


    use DatabaseTransactions;
    protected $moduleRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->moduleRepository = app(ModuleRepository::class);
    }


    public function test_Get_All_Modules()
    {
        // Create test data
        $Module1 = Module::create([
            'name' => 'un',
            'description' => 'repository patterns',


        ]);
        $Module2 = Module::create([

            'name' => 'deux',
            'description' => 'views',



        ]);
        $Module3 = Module::create([

            'name' => 'trois',
            'description' => 'deployment',
        ]);


        // Call the getAllImages method with a search query

        $result = $this->moduleRepository->get_Allmodules(5);
        // Assert that the paginated collection contains the correct items
        // $this->assertEquals(2, $result->count());
        $this->assertTrue($result->contains('Name', 'un'));
        $this->assertTrue($result->contains('Name', 'deux'));
        $this->assertFalse($result->contains('Name', 'trois'));
    }



     // ================================ create image =================================
 public function test_create_Module()
 {
     $inputData = [
        'name' => 'quatre',
        'description' => 'collaboration',
     ];

     // Call the create method
     $createdModule = $this->moduleRepository->create($inputData);

     
     $this->assertInstanceOf(Module::class, $createdModule);

 
     $this->assertDatabaseHas('modules', $inputData);

 }




 
    // ======================== edit function ========================

    public function test_edit_Module()
    {
        // Create a test image
        $Module = Module::create([  

            'name' => 'cinq',
            'description' => 'le module cing',


    ]);

    
    $updatedAttributes = [
        'name' => 'six',
        'description' => 'le module six',

    ];


    // Call the update method
    $editedModule = $this->moduleRepository->update($updatedAttributes, $Module->id);

       
        $this->assertInstanceOf(Module::class, $editedModule);

   
        $this->assertEquals('six', $editedModule->name);
    }






    public function testDeleteImages()
    {
        // Create a test image
        $Module = Module::create([
            'name' => 'sept',
            'description' => 'le module sept',    
        ]);

        // Call the delete_images method
        $this->moduleRepository->destroy($Module->id);

        // Assert that the image has been deleted from the database
        $this->assertDatabaseMissing('modules', ['id' => $Module->id]);
    }




}
