<?php

/**
 * Paginator
 * 
 * Data for selecting a page of records
 */

class Paginator

{    
    /**
     * Number of records to return
     * @var integar
     */

   public $limit;

   /**
    * Number of records to skipe before the page 
    * @var intengar
    */
   public $offset;
   
   /**
    * Previous page number
    * @var integar
    */
    public $previous;

    /**
    * Next page number
    * @var integar
    */
    public $next;


   /**
    * Constructor
    *@param integar $page Page number
    *@param integar $records_per_page Number of records per page
    *@return void 
    */

   public function __construct($page, $records_per_page, $total_records)

   {
      $this ->limit = $records_per_page;
      
       
      $page = filter_var($page, FILTER_VALIDATE_INT, [
         'options' => [
         'default' => 1,
         'min_range' => 1

         ]
         ]);
         
      
      if ($page > 1) {
      $this->previous = $page -1;
      }   
      
   
      $total_pages = ceil($total_records / $records_per_page);

      
      if ($page < $total_pages) {
      $this ->next = $page + 1;

     }

      $this->offset = $records_per_page * ($page - 1);

   }

}