<?php 
    include '../api/weatherapi.php';  
    
    function showTop($cweather,$threadcat){
        
        if($cweather==="Clear"){
        
            $db=new SQLITE3("../db/databas.db");
            $sql = "SELECT * FROM threads join ratings on threads.tid = ratings.tid where threads.category = ':threadcat' 
            and threads.enviroment = 'Sun'
            order by ratings.rating desc
            LIMIT 1"; 
            
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':threadcat', $threadcat, SQLITE3_TEXT);
            
            $result = $stmt->execute();
            while($row=$result->fetchArray()) {
                return $row['tid'];
        
            }
        
        }
        if($cweather==="Rain"){   
            
            $db= new SQLITE3("../db/databas.db");
            $sql = "SELECT * FROM threads join ratings on threads.tid = ratings.tid where threads.category = '$threadcat' 
            and threads.enviroment = 'Rain'
            order by ratings.rating desc
            LIMIT 1";  
            $stmnt = $db->prepare($sql);
        
            $result = $stmnt->execute();
            while($row=$result->fetchArray()){
                return $row['tid'];
        
        }
        if($cweather==="Clouds"){
            
            $db=new SQLITE3("../db/databas.db");
            $sql = "SELECT * FROM threads join ratings on threads.tid = ratings.tid where threads.category = '$threadcat' 
            order by rating desc
            LIMIT 1";  
            $stmnt = $db->prepare($sql);
            
            $result = $stmnt->execute();
            while($row=$result->fetchArray()) {
                return $row['tid'];
        
            }
        }
            
    }        
            
}  

?>

<?php 

/*else{
                
                    
                $db=new SQLITE3("./db/sqlite.db");
                $sql = "SELECT * FROM threads join ratings on threads.tid = ratings.tid where threads.category = '$threadcat' 
                order by rating desc
                LIMIT 1";  
                $stmnt = $db->prepare($sql);
                
                $result = $stmnt->execute();
                while($row=$result->fetchArray()) {
                    return $row['tid'];
            
                }*/

?>