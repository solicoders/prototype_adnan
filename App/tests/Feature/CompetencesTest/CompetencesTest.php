<?php

namespace Tests\Feature\CompetencesTest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


use Carbon\Carbon;
use App\Models\Competence\Competence;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\repositories\CompetenceRepository\CompetenceRepository;
use Tests\TestCase;

class CompetencesTest extends TestCase
{


    use DatabaseTransactions;
    protected $competenceRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->competenceRepository = app(CompetenceRepository::class);
    }


    public function test_Get_All_Competences()
    {
        // Create test data
        $competence1 = Competence::create([
            'title' => 'backend',
            'description' => 'repository patterns',
            'module_id' => 2,

        ]);
        $competence2 = Competence::create([

            'title' => 'front end',
            'description' => 'views',
            'module_id' => 2,


        ]);
        $competence3 = Competence::create([

            'title' => 'deployment',
            'description' => 'deployment',
            'module_id' => 1,
        ]);


        // Call the getAllImages method with a search query
        $competenceName = 'end';
        $result = $this->competenceRepository->getCompetences($competenceName);

        // Assert that the paginated collection contains the correct items
        // $this->assertEquals(2, $result->count());
        $this->assertTrue($result->contains('Title', 'backend'));
        $this->assertTrue($result->contains('Title', 'front end'));
        $this->assertFalse($result->contains('Title', 'deploymend'));
    }



     // ================================ create image =================================
 public function test_create_competence()
 {
     $inputData = [
        'title' => 'collaboration',
        'description' => 'collaboration',
        'module_id' => 1,
     ];

     // Call the create method
     $createdcompetence = $this->competenceRepository->create($inputData);

     
     $this->assertInstanceOf(Competence::class, $createdcompetence);

 
     $this->assertDatabaseHas('competences', $inputData);

 }




 
    // ======================== edit function ========================

    public function test_edit_Competence()
    {
        // Create a test image
        $competence = Competence::create([  

            'title' => 'maquettage',
            'description' => 'stagiare@solicode.com',
            'module_id' => 2,

    ]);

    
    $updatedAttributes = [
        'title' => 'maquettage 11',
        'description' => 'maquettage application web',
        'module_id' => 2,

    ];


    // Call the update method
    $editedcompetence = $this->competenceRepository->update($updatedAttributes, $competence->id);

       
        $this->assertInstanceOf(Competence::class, $editedcompetence);

   
        $this->assertEquals('maquettage 11', $editedcompetence->title);
    }






    public function testDeleteImages()
    {
        // Create a test image
        $competence = Competence::create([

            'title' => 'maquettag',
            'description' => 'maquettage application',
            'module_id' => 2,
        ]);

        // Call the delete_images method
        $this->competenceRepository->destroy($competence->id);

        // Assert that the image has been deleted from the database
        $this->assertDatabaseMissing('competences', ['id' => $competence->id]);
    }




}
