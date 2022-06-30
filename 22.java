// **Deskripsi**
// Pada tugas kali ini, betulkan kode yang tersedia agar bisa memberikan hasil
// yang sesuai dengan permintaan soal.

// ---
// Jika diketahui sebuah _array_ dengan _n_ elemen _distinct integer_, ubahlah
// susunan elemen dalam array tersebut agar menjadi sebuah deret zig zag. Deret
// zig zag adalah deret yang nilai pada _k_ elemen pertama terurut naik dan
// nilai pada _k_ elemen akhir terurut turun, dengan _k_ adalah elemen tengah
// array yang ditentukan dengan formula `k = (n+1)/2`.

// **Input**
// Baca input dari stdin berupa angka. Baris pertama menentukan _t_ yang berarti
// jumlah test case. Baris berikutnya setelah _t_ adalah _n_, yaitu jumlah
// elemen dalam array. Baris berikutnya setelah _n_ adalah _a_, yaitu elemen
// dalam array yang dipisahkan dengan spasi.

// **Constraints**

// - 1 <= t <= 10
// - 1 <= n <= 10
// - 1 <= a <= 10
// - kode yang diubah maksimal 3 baris
// - dilarang menambah atau mengurangi baris kode

// **Contoh**
// `a = [2,3,5,1,4]`
// Jika array diubah menjadi `[1,2,5,4,3]` maka hasilnya adalah deret zig zag.

// **Sample Input**

// 1
// 7
// 1 2 3 4 5 6 7

// **Sample Output**

// 1 2 3 7 6 5 4

// **Kode yang perlu diperbaiki**

// import java.util.*;
// import java.lang.*;
// import java.io.*;
// import java.math.*;

// public class Main {

// public static void main (String[] args) throws java.lang.Exception {
// Scanner kb = new Scanner(System.in);
// int test_cases = kb.nextInt();
// for(int cs = 1; cs <= test_cases; cs++){
// int n = kb.nextInt();
// int a[] = new int[n];
// for(int i = 0; i < n; i++){
// a[i] = kb.nextInt();
// }
// findZigZagSequence(a, n);
// }
// }

// public static void findZigZagSequence(int [] a, int n){
// Arrays.sort(a);
// int mid = (n + 1)/2);
// int temp = a[mid];
// a[mid] = a[n - 1];
// a[n - 1] = temp;

// int st = mid + 1;
// int ed = n - 1;
// while(st <= ed){
// temp = a[st];
// a[st] = a[ed];
// a[ed] = temp;
// st = st + 1;
// ed = ed + 1;
// }
// for(int i = 0; i < n; i++){
// if(i > 0) System.out.print(" ");
// System.out.print(a[i]);
// }
// System.out.println();
// }
// }
