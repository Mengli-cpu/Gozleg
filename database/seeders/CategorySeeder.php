<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Clothes', 'name_tm' => 'Egin-eşikler', 'name_ru' => 'Одежда'],
            ['name' => 'Shoes', 'name_tm' => 'Aýakgaplar', 'name_ru' => 'Обувь'],
            ['name' => 'Electronics', 'name_tm' => 'Elektronika', 'name_ru' => 'Электроника'],
            ['name' => 'Computers', 'name_tm' => 'Kompýuterler', 'name_ru' => 'Компьютеры'],
            ['name' => 'Home & Garden', 'name_tm' => 'Öý we mellek', 'name_ru' => 'Дом и сад'],
            ['name' => 'Appliances', 'name_tm' => 'Öý tehnikasy', 'name_ru' => 'Бытовая техника'],
            ['name' => 'Beauty & Health', 'name_tm' => 'Gözellik we saglyk', 'name_ru' => 'Красота и здоровье'],
            ['name' => 'Sports & Outdoors', 'name_tm' => 'Sport we dynç alyş', 'name_ru' => 'Спорт и отдых'],
            ['name' => 'Toys & Games', 'name_tm' => 'Oýunjaklar we oýunlar', 'name_ru' => 'Игрушки и игры'],
            ['name' => 'Automotive', 'name_tm' => 'Awtoulag harytlary', 'name_ru' => 'Автотовары'],
            ['name' => 'Accessories', 'name_tm' => 'Aksessuarlar', 'name_ru' => 'Аксессуары'],
            ['name' => 'Books', 'name_tm' => 'Kitaplar', 'name_ru' => 'Книги'],
            ['name' => 'Furniture', 'name_tm' => 'Mebeller', 'name_ru' => 'Мебель'],
            ['name' => 'Jewelry', 'name_tm' => 'Şaý-sepler', 'name_ru' => 'Ювелирные изделия'],
            ['name' => 'Pet Supplies', 'name_tm' => 'Haýwanlar üçin harytlar', 'name_ru' => 'Зоотовары'],
            ['name' => 'Carpets & Textiles', 'name_tm' => 'Halylar we dokma', 'name_ru' => 'Ковры и текстиль'],
        ];
        foreach($categories as $c){
            Category::create([
                'name' => $c['name'],
                'name_tm' => $c['name_tm'],
                'name_ru' => $c['name_ru'],
            ]);
        }
    }
}
