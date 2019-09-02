<?php
class Produtos{
    private $lanches;
    private $ingredientes;
    private $valor;
    private $image;

    public function setLanches($l){
        $this->lanches = addslashes($l);
    }
    public function setIngredientes($i){
        $in = implode(array_filter($i), ",");
		$this->ingredientes = addslashes($in);
    }
    public function setImage($foto){
        if(!empty($foto)){

            $type = $foto['type'];

            if(in_array($type, array('image/jpeg', 'image/png'))){

                $tmpname = md5(time().rand(0,999)).'.jpg';
                
                move_uploaded_file($foto['tmp_name'], 'assets/image/lanche/'.$tmpname);

                list($width_orig, $height_orig) = getimagesize('assets/image/lanche/'.$tmpname);
                $raio = $width_orig/$height_orig;

                $width = 500;
                $height = 500;

                if($width/$height > $raio){
                    $width = $height * $raio;
                } else {
                    $height = $width/$raio;
                }

                $img = imagecreatetruecolor($width, $height);
                $origi = imagecreatefromjpeg('assets/image/lanche/'.$tmpname);
                imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                imagepng($img, 'assets/image/lanche/'.$tmpname, 8);

                $this->image = $tmpname;
            }
        }
    }
    public function setPreco($p){
        $this->preco = addslashes($p);
    }
    public function getLanches(){
        return $this->lanches;
    }
    public function getIngredientes(){
        return $this->ingredientes;
    }
    public function getImage(){
        return $this->image;
    }
    public function getPreco(){
        return $this->preco;
    }
    
}
?>