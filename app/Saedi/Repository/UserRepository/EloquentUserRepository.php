<?php 
namespace App\Saedi\Repository\UserRepository;

use App\User;

class EloquentUserRepository implements UserRepository
{
   protected $errors;
   protected $user;

   public function __construct()
   {
      return $this->user = new User();
   }

   public function errors()
   {

   }

   public function all(array $related = null)
   {
      return $this->user->all();
   }

   public function get($id, array $related = null)
   {
      return $this->user->find($id);
   }

   public function getWhere($column, $value, array $related = null)
   {
      return $this->user->where($column,'=',$value)
   }

   public function getRecent($limit, array $related = null)
   {
      return $this->user->limit($limit)->get();
   }

   public function create(array $data)
   {
      return $this->user->create($data);
   }

   public function update(array $data)
   {
      return $this->user->update($data);
   }

   public function delete($id)
   {
      return $this->user->destroy($id);
   }

   public function deleteWhere($column, $value)
   {
      retutn $this->user->where($column,'=',$value)->destroy();
   }
}