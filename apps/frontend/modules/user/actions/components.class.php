<?php

class userComponents extends sfComponents
{
  /**
   * @param int $this->id User Id
   * 
   * Return User records
   */
  public function executeWidgetUserInfo()
  {
    if(isset($this->id)){
      $this->user = Doctrine::getTable('sfGuardUser')->find($this->id);
    	
    }
    
  }
}

?>