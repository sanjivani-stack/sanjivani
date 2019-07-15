<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator </title>
</head>
<body>
    
    <?php
        class Calculator{

            var $no1;
            var $no2;
            var $operation;
            var $result;

            function __construct($no1, $no2, $operation) {
                $this->no1=$no1;
                $this->no2=$no2;
                $this->operation=$operation;
            }

            function calculate(){
                switch($this->operation) {
                    
                    case "add":
                                $this->result=$this->no1 + $this->no2;
                                break;

                    case "sub":
                                $this->result=$this->no1 - $this->no2; 
                                break;
                                
                    case "mul":
                                $this->result=$this->no1 * $this->no2;
                                break;

                    case "div":
                                $this->result=$this->no1 / $this->no2;
                                break;
                }
            }
        }

        if(isset($_GET['submit'])) {

            //instance variable of class calculator object
            $calculate_var = new Calculator($_GET['no1'], $_GET['no2'], $_GET['operation']);
            $calculate_var->calculate();

            echo $calculate_var->result;
        }

    ?>
    <div class="Calculator">
        <h1>Calculator</h1>
        <form method="get" action="calculator.php">
            Number1 <input type="number" name="no1" value="0">
            Number2 <input type="number" name="no2" value="0"><br><br>

            <input type="radio" name="operation" value="add" checked>Add<br>
            <input type="radio" name="operation" value="sub">Subtract<br>
            <input type="radio" name="operation" value="mul">Multiply<br>
            <input type="radio" name="operation" value="div">Division<br><br>
            
            <input type="submit" name="submit" value="submit">

        </form>
        
    </div>

</body>
</html>