<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('prenom')->nullable()->after('name');
            $table->string('nom')->nullable()->after('name');
        });

        if (User::all()->isNotEmpty()) {
            foreach (User::all() as $user) {
                $userNameArray = preg_split("/[\s]+/", $user->name);
                $prenom = "";
                $nom = "";
                foreach($userNameArray as $userName) {
                    if ($userName === $userNameArray[0]) {
                        $prenom = $userName;
                    } else {
                        if ($nom === "") {
                            $nom .= $userName;
                        } else {
                            $nom = $nom . " " . $userName;
                        }
                    }
                }
                $user->prenom = $prenom;
                $user->nom = $nom;

                $user->save();
            }
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->after('prenom');
        });

        if (User::all()->isNotEmpty()) {
            foreach (User::all() as $user) {
                $user->name = $user->prenom . " " . $user->nom;
                $user->save();
            }
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('prenom');
            $table->dropColumn('nom');
        });
    }
};
