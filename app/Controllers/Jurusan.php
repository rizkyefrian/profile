<?php namespace App\Controllers;

use App\Models\ModelJurusan;

class Jurusan extends BaseController
{
    protected $modelJurusan;

    public function __construct()
    {
        $this->modelJurusan = new ModelJurusan();
    }

	public function index()
	{
        $data = [
            'jurusan' => $this->modelJurusan->getJurusan(),
            'isi' => 'jur/index',
        ];
        echo view('layout/Wrapper', $data);  
    }

    public function create()
    {
        //untuk validasi
        // session();
        $data = [
            'title' => 'Form Tambah Data',
            'isi' => 'jur/add',
            'validation' => \Config\Services::validation(),
            
        ];

        // return view ('jur/add', $data);
        echo view('layout/Wrapper', $data);  

    }

    public function save()
    {
        //membuat validasi
        if(!$this->validate([
            //pesan error di setting sendiri
            'name' => [
                'rules' => 'required|is_unique[jurusans.name]',
                'errors' => [
                    'required' => '{field} Nama Jurusan harus diisi',
                    'is_unique' => '{field} Nama Jurusan sudah terdaftar'
                ]
                ],
        ])){
            // $validation = \Config\Services::validation();
            // return redirect()->to('/jurusan/create')->withInput()->with('validation', $validation);
            return redirect()->to('/jurusan/create')->withInput();
        }
        // var_dump($this->request->getVar('name'));
        // die();
        $this->modelJurusan->save([
            'name' => $this->request->getVar('name'),
            ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/jurusan');
    }

	//--------------------------------------------------------------------

    public function delete($id)
    {
        $this->modelJurusan->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/jurusan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Tambah Data',
            'validation' => \Config\Services::validation(),
            'jurusan' => $this->modelJurusan->getJurusan($id)
        ];

        return view ('jur/edit', $data);
    }

    public function update($id)
    {

        //membuat validasi
        $namaJurusan = $this->modelJurusan->getJurusan($this->request->getVar('id'));
        if($namaJurusan['name'] == $this->request->getVar('name')){
            $rule_name = 'required';
        }else{
            $rule_name = 'required|is_unique[jurusans.name]';
        }

        if(!$this->validate([
            'name' => [
                'rules' =>  $rule_name,
                'errors' => [
                    'required' => '{field} Nama Jurusan harus diisi',
                    'is_unique' => '{field} Nama Jurusan sudah terdaftar'
                ]
                ],
        ])){
            return redirect()->to('/jurusan/edit/' .$this->request->getVar('id'))->withInput();
        }
        // var_dump($this->request->getVar('name'));
        // die();
        $this->modelJurusan->save([
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('name')
            ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/Jurusan');
    }
}
