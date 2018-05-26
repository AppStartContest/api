<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDummy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::raw('
INSERT INTO `asc_rooms` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, \'room1\'),
(2, NULL, NULL, \'room2\');

INSERT INTO `asc_users` (`phone`, `deleted_at`, `name`) VALUES
(\'1\', NULL, \'user5\'),
(\'2\', NULL, \'user2\'),
(\'3\', NULL, \'user1\'),
(\'4\', NULL, \'user4\'),
(\'5\', NULL, \'user3\');

INSERT INTO `asc_room_user` (`room_id`, `user_id`) VALUES
(1, \'1\'),
(2, \'1\'),
(1, \'2\'),
(2, \'2\'),
(1, \'3\'),
(2, \'3\'),
(2, \'4\'),
(2, \'5\');

INSERT INTO `asc_events` (`id`, `created_at`, `updated_at`, `deleted_at`, `room_id`, `name`, `date`, `time`, `description`) VALUES
(1, \'2018-05-18 17:38:15\', \'2018-05-18 17:38:15\', NULL, 1, \'First event\', \'2018-05-25\', \'18:00:00\', \'blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla !\'),
(2, \'2018-05-18 17:38:15\', \'2018-05-18 17:38:15\', NULL, 2, \'Beer fest\', \'2018-05-18\', NULL, \' blablabla blablabla blablabla blablabla blablabla\'),
(3, \'2018-05-18 17:38:38\', \'2018-05-18 17:38:38\', NULL, 2, \'\', \'2018-05-29\', NULL, \'zzaeazazarazrazraz\');

INSERT INTO `asc_expenses` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `room_id`, `value`, `description`) VALUES
(1, \'2018-05-18 17:27:12\', \'2018-05-18 17:27:12\', NULL, \'1\', 1, 10.00, \'Boulangerie\'),
(2, \'2018-05-18 17:27:12\', \'2018-05-18 17:27:12\', NULL, \'2\', 1, 5.00, \'Jsp\'),
(3, \'2018-05-18 17:27:12\', \'2018-05-18 17:27:12\', NULL, \'1\', 1, 15.00, \'ertyui\'),
(4, \'2018-05-18 17:27:12\', \'2018-05-18 17:27:12\', NULL, \'1\', 2, 20.00, \'azerazer\'),
(5, \'2018-05-18 17:27:12\', \'2018-05-18 17:27:12\', NULL, \'2\', 2, 25.00, \'azeazer\'),
(6, \'2018-05-18 17:27:12\', \'2018-05-18 17:27:12\', NULL, \'5\', 2, 3.00, \'aezrazer\'),
(7, \'2018-05-18 17:27:12\', \'2018-05-18 17:27:12\', NULL, \'5\', 2, 12.00, \'azerazerazer\'),
(8, \'2018-05-18 17:27:12\', \'2018-05-18 17:27:12\', NULL, \'5\', 2, 60.00, \'azeraezrazer\'),
(9, \'2018-05-18 17:27:12\', \'2018-05-18 17:27:12\', NULL, \'4\', 2, 39.99, \'azeazer\');

INSERT INTO `asc_expense_user` (`expense_id`, `user_id`) VALUES
(1, \'1\'),
(2, \'1\'),
(3, \'1\'),
(4, \'1\'),
(6, \'1\'),
(9, \'1\'),
(1, \'2\'),
(2, \'2\'),
(3, \'2\'),
(4, \'2\'),
(6, \'2\'),
(7, \'2\'),
(8, \'2\'),
(9, \'2\'),
(4, \'3\'),
(5, \'3\'),
(6, \'3\'),
(9, \'3\'),
(5, \'4\'),
(6, \'4\'),
(7, \'4\'),
(9, \'4\'),
(6, \'5\'),
(9, \'5\');

INSERT INTO `asc_messages` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `room_id`, `expense_id`, `event_id`, `content`) VALUES
(29, \'2018-05-18 17:37:08\', \'2018-05-18 17:37:08\', NULL, \'1\', 1, NULL, NULL, \'Hello !\'),
(30, \'2018-05-18 19:00:00\', \'2018-05-18 17:37:08\', NULL, \'2\', NULL, NULL, NULL, \'Salut toi !\'),
(31, \'2018-05-18 17:37:08\', \'2018-05-18 17:37:08\', NULL, \'1\', 1, NULL, NULL, \'azerazer\'),
(32, \'2018-05-18 17:37:08\', \'2018-05-18 17:37:08\', NULL, \'3\', 2, NULL, NULL, \'azerazerazer\'),
(33, \'2018-05-18 17:37:08\', \'2018-05-18 17:37:08\', NULL, \'4\', NULL, 3, NULL, \'What is it?\'),
(34, \'2018-05-18 17:37:08\', \'2018-05-18 17:37:08\', NULL, \'5\', NULL, 3, NULL, \'Bakery this morning\'),
(35, \'2018-05-18 17:39:20\', \'2018-05-18 17:39:20\', NULL, \'1\', NULL, NULL, 1, \'Cool !\'),
(36, \'2018-05-19 08:00:00\', \'2018-05-18 17:39:20\', NULL, \'2\', NULL, NULL, 1, \'Lets go\');


INSERT INTO `asc_migrations` (`id`, `migration`, `batch`) VALUES
(1, \'2014_10_12_100000_create_password_resets_table\', 1),
(2, \'2018_05_18_155515_create_users_table\', 1),
(3, \'2018_05_18_164803_create_events_table\', 1),
(4, \'2018_05_18_164808_create_messages_table\', 1),
(5, \'2018_05_18_164812_create_expenses_table\', 1),
(6, \'2018_05_18_164827_create_rooms_table\', 1),
(7, \'2018_05_18_165615_create_pivots_tables\', 1),
(8, \'2018_05_18_165908_foreign_keys\', 1);
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
