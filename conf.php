<?php
mysql_connect('localhost','a107036_qiwi','3T9Z6bNvej');
mysql_select_db('a107036_qiwi');

$start_data='10.07.2014 20:00'; // ���� ������
$time_move=0; // ������� ���� +- ����

$mdate=array('������','�������','�����','������','���','����','����','�������','��������','�������','������','�������');

$d_proc=10;
$d_min=10; // ����������� �����
$d_max=12000; // ������������ �����
$p_ref=10; // ��������
$d_wmin=10; // ����������� ����� ��� ������
$d_wmax=15000; // ������������ ����� ��� ������
$tocom=10; // ��������
$d_days=1;

//$d_isum=0; // ����� ���������� ������������ ����� �������. ���� �� ���� �� 0
//$d_itime=6; // ����� ������� ����� ����������� ������������ ����� �������
//$d_istop=3000; // ������ ����� ����������. �� ���������� ����� ������������ ������ ��� �����

$inc=array('instruction','advert','auth','news');
$inc_cab=array('popolnit','vyvesti','refs','settings');
?>
