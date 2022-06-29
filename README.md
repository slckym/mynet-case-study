Kodları git üzerinden aldıktan sonra çncelikle .env.example dosyasından .env dosyası oluşturun ve veri tabanı bilgilerini girin (İstediğinizi girebilirsiniz containerlar oluşurken belirlediğiniz ayarlara göre oluşacak)

Sonrasında projenin bulunduğu dizinde aşağıda ki komutlar ile devam edin

```shell
docker-compose up -d
```
Containerlar oluştuktan sonra tabloları ve varsayılan kullanıcı oluşturmak için
```shell
docker-compose run --rm artisan migrate --seed
```
CSS ve javascript dosyalarının oluşturmak için
```shell
npm install
npm run dev
```


Giriş bilgileri
```text
admin@admin.com
password
```
*Kullanıcı bilgilerini değiştirmek için migrationdan önce bu dosyada düzenleme yapın* ``database/seeders/UserSeeder.php``
