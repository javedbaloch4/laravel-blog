<?php
/**
 * Created by PhpStorm.
 * User: Javed Baloch
 * Date: 7/30/2018
 * Time: 3:35 PM
 */

namespace App\Repositories;

Interface RepositoryInterface {

    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function show($id);

    public function delete($id);

}
