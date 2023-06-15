
<?php

/**
 * Created by PhpStorm.
 * User: lin
 * Date: 2017/6/9
 * Time: 11:19
 * 实现php共享内存消息队列
 */
class ShmQueue
{
    private $maxQSize = 0;//队列最大长度
    private $front = 0;//队头指针
    private $rear = 0; //队尾指针
    private $blockSize = 256;  // 块的大小(byte)
    private $memSize = 1280;  // 最大共享内存(byte)
    private $shmId = 0;//根据这个id可以操作该共享内存片段
    private $filePtr = APP_PATH.'public/shmq.ptr';
    private $semId = 0;

public function __construct()
    {
        $shmkey = ftok(__FILE__, 't');//产生系统id
        $this->shmId = shmop_open($shmkey, "c", 0644, $this->memSize );//创建一个内存段
        $this->maxQSize = $this->memSize / $this->blockSize;
        // 申請一个信号量
        $this->semId = sem_get($shmkey, 1);
        sem_acquire($this->semId); // 申请进入临界
        $this->init();
    }
    private function init()
    {
        if ( file_exists($this->filePtr) ){
            $contents = file_get_contents($this->filePtr);
            $data = explode( '|', $contents );
            if ( isset($data[0]) && isset($data[1])){
                $this->front = (int)$data[0];
                $this->rear  = (int)$data[1];
            }
        }
    }





public function getLength()
    {
        return (($this->rear - $this->front + $this->memSize) % ($this->memSize) )/$this->blockSize;
    }
    public function enQueue( $value )
    {
        if ( $this->ptrInc($this->rear) == $this->front ){ // 队满
            return false;
        }
        //echo $this->front;
        $data = $this->encode($value);
        shmop_write($this->shmId, $data, $this->rear );
        $this->rear = $this->ptrInc($this->rear);
        return  $this->decode($data);
    }
    public function deQueue()
    {
        if ( $this->front == $this->rear ){ // 队空
            throw new Exception(" block size is null!");
        }
        $value = shmop_read($this->shmId, $this->front, $this->blockSize-1);
        $this->front = $this->ptrInc($this->front);
        return $this->decode($value);
    }

private function ptrInc( $ptr )
    {
        return ($ptr + $this->blockSize) % ($this->memSize);
    }
    private function encode( $value )
    {
        $data = serialize($value) . "__eof";
        //echo '';
        //echo strlen($data);
        //echo '';
       // echo $this->blockSize -1;
       // echo '';

        if ( strlen($data) > $this->blockSize -1 ){
            throw new Exception(strlen($data)." is overload block size!");
        }
        return $data;
    }


 public function exist($value){//判断队头的数据

        $data = shmop_read($this->shmId, $this->front, $this->blockSize-1);
        if($value == $this->decode($data)){
            return 1;
        }
        return 0;
    }
    private function decode( $value )
    {
        //return $value;
        $data = explode("__eof", $value);
        return unserialize($data[0]);
    }
    public function __destruct()
    {
        //保存队头和队尾指针
        $data = $this->front . '|' . $this->rear;
        file_put_contents($this->filePtr, $data);
        sem_release($this->semId); // 出临界区, 释放信号量
    }

}
