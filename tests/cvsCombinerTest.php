<?php
include __DIR__."/../csv-combiner.php";

class cvsCombinerTest extends \PHPUnit\Framework\TestCase {
    
    /**
     * @test 
     */
    public function testJoinTwoFiles(): void{
        $files = array("./tests/unitTestFiles/clothing.csv","./tests/unitTestFiles/accessories.csv");
        joinFiles($files);
        $this->expectOutputString(
           "\"email_hash\",\"category\",\"filename\""."\n".
           "\"b9f6f22276c919da793da65c76345ebb0b072257d12402107d09c89bc369a6b6\",\"Shirts\",\"clothing.csv\""."\n".
           "\"c2b5fa9e09ef2464a2b9ed7e351a5e1499823083c057913c6995fdf4335c73e7\",\"\\\"Gingham\\\" Shorts\",\"clothing.csv\""."\n".
           "\"faaee0ff7d06b05313ecb75d46a9aed014b11023ca1af5ec21a0607848071d18\",\"Tanks\",\"clothing.csv\""."\n".
           "\"b9f6f22276c919da793da65c76345ebb0b072257d12402107d09c89bc369a6b6\",\"Watches\",\"accessories.csv\""."\n".
           "\"c2b5fa9e09ef2464a2b9ed7e351a5e1499823083c057913c6995fdf4335c73e7\",\"Wallets\",\"accessories.csv\""."\n".
           "\"4727745894cc3d99632c89a64067f69327913989cddb9e2de5793d4de12ef4ef\",\"Satchels\",\"accessories.csv\""."\n"
        );
    }

    /**
     * @test 
     */
    public function testThreeFilesMultiCollumns(): void {
        $files = array("./tests/unitTestFiles/testFile1.csv","./tests/unitTestFiles/testFile2.csv", "./tests/unitTestFiles/testFile3.csv");
        joinFiles($files);
        $this->expectOutputString(
            "\"column1\",\"column2\",\"column3\",\"column4\",\"filename\""."\n".
            "\"2022\",\"sun\",\"rain\",\"rain\",\"testFile1.csv\""."\n".
            "\"2021\",\"windy\",\"cloud\",\"sun\",\"testFile1.csv\""."\n".
            "\"2019\",\"cat\",\"bird\",\"dog\",\"testFile2.csv\""."\n".
            "\"2018\",\"dog\",\"dog\",\"dog\",\"testFile2.csv\""."\n".
            "\"2007\",\"win\",\"lose\",\"win\",\"testFile3.csv\""."\n".
            "\"2010\",\"win\",\"win\",\"lose\",\"testFile3.csv\""."\n"
        );
    }
    
    /**
     * @test
     */
    public function testFileNotFoundException(): void {
        $this->expectExceptionMessage("File not found.");
        $files = array("./testUnitTestFiles/fakefile.csv");
        joinFiles($files);
    }


}



 