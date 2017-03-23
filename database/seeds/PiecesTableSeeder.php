<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Piece;
use App\Type;
use App\Technique;
use App\PieceArea;
use App\Image;
use App\Imagable;
use App\Institution;
use App\Exhibition;
use App\Publication;
use App\Author;
use App\PieceAuthor;
use App\PieceTechnique;
use App\PieceAcquisition;
use App\File;
use App\PieceIntervention;
use App\PieceConservation;
use App\Fileable;
use App\PieceLoan;
use App\PieceVault;
use App\PiecePublication;
use App\PieceExhibition;

class PiecesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        Type::create([
            'name'=> 'Pintura'
        ]);
        Type::create([
            'name'=> 'Gráfica'
        ]);
        Type::create([
            'name'=> 'Escultura'
        ]);
        $technique = Technique::create([
            'name'=> 'Oleo'
        ]);
        $author = Author::create([
            'name' => 'Picasso'
        ]);
        $institution = Institution::create([
            'name' => 'UNAM'
        ]);

        $piece = Piece::create([
            'title'=> $faker->text(14),
            'year'=>'2017',
            'price'=>'5000',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
            ullamco laboris nisi ut aliquio.',
            'type_id'=>1,
            'user_id'=>1,
            'loan'=>1
        ]);

        $piece_author = PieceAuthor::create([
            'author_id'=>$author->id,
            'piece_id'=>$piece->id
        ]);

        $piece_technique = PieceTechnique::create([
            'piece_id'=>$piece->id,
            'technique_id'=>$technique->id
        ]);

        $piece_acquisition = PieceAcquisition::create([
            'piece_id'=>$piece->id,
            'forma'=>'Donación',
            'fecha'=>'01-02-2007',
            'valuation'=>'7000'
        ]);

        //Dimentions
        PieceArea::create([
            'piece_id'=> $piece->id,
            'width'=> '100',
            'height'=> '90',
            'type'=> 'Con Marco'
        ]);

        PieceArea::create([
            'piece_id'=> $piece->id,
            'width'=> '90',
            'height'=> '80',
            'type'=> 'Sin Marco'
        ]);

        PieceArea::create([
            'piece_id'=> $piece->id,
            'width'=> '80',
            'height'=> '70',
            'type'=> 'Padding'
        ]);
        //Dimentions


        $image = Image::create([
            'name'=> 'imagen.png'
        ]);

        Imagable::create([
            'image_id'=> $image->id,
            'imagable_type'=> 'App\Piece',
            'imagable_id'=> $piece->id
        ]);

        $file = File::create([
            'name'=> 'xgs2.pdf'
        ]);

        $intervention = PieceIntervention::create([
            'process'=> 'hello world!',
            'piece_id'=>$piece->id,
            'year'=>'2017',
            'manager'=>'Hector'
        ]);

        $conservation = PieceConservation::create([
            'state'=> 'Excelente',
            'piece_id'=>$piece->id
        ]);

        $loan = PieceLoan::create([
            'manager'=> 'Pedro',
            'institution_id'=>$institution->id,
            'piece_id'=>$piece->id,
            'start'=>'2017-01-02',
            'end'=>'2017-01-09'
        ]);

        $vault = PieceVault::create([
            'rack'=> '8B',
            'piece_id'=>$piece->id
        ]);
        $publi = Publication::create([
            'title'=> 'Revista de Arte',
            'author'=>'Juan',
            'fecha'=>'10-mar-2017',
            'reference'=>'http://google.com'
        ]);

        $publication = PiecePublication::create([
            'publication_id'=> $publi->id,
            'piece_id'=>$piece->id
        ]);

        $exhibition = Exhibition::create([
            'title'=> 'Los Post-Modernos',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
            ullamco laboris nisi ut aliquio.2',
            'user_id'=>1
        ]);

        PieceExhibition::create([
            'exhibition_id'=> $exhibition->id,
            'piece_id'=>$piece->id
        ]);

        Fileable::create([
            'file_id'=> $file->id,
            'fileable_type'=> 'App\PieceIntervention',
            'fileable_id'=> $intervention->id
        ]);

        Fileable::create([
            'file_id'=> $file->id,
            'fileable_type'=> 'App\PieceConservation',
            'fileable_id'=> $conservation->id
        ]);
    }
}
