<?php
/**
 * http://php.net/manual/en/class.traversable.php
SPL�ṩ��6���������ӿڣ�
Traversable	�����ӿڣ����һ�����Ƿ����ʹ�� foreach ���б����Ľӿڣ�
Iterator	�������ӿڣ������ڲ������Լ����ⲿ����������Ľӿڣ�
IteratorAggregate	�ۺ�ʽ�������ӿڣ������ⲿ�������Ľӿڣ�
Generator
OuterIterator	������Ƕ�׽ӿڣ���һ��������������������һ���������У�
RecursiveIterator	�ݹ�������ʽӿڣ��ṩ�ݹ���ʹ��ܣ�
SeekableIterator	�������������ʽӿڣ�ʵ�ֲ��ҹ��ܣ�
 */

interface Traversable{
}

interface ArrayAccess extends \Traversable{
    public function offsetExists($offset);
    public function offsetGet($offset);
    public function offsetSet($offset, $value);
    public function offsetUnset($offset);
}
interface Iterator extends Traversable{
    public function current();
    public function key();
    public function next();
    public function rewind();
    public function valid();
}


interface Serializable{
    public function serialize();
    public function unserialize();
}
