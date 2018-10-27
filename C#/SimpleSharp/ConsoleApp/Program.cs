using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp
{
    internal class Program
    {
        private static void Main(string[] args)
        {
            string text = "Simple text";
            String iv = CryptLib.GenerateRandomIV(16);
            string key = CryptLib.getHashSha256("Your key", 32);
            text = CryptLib.Encrypt(text, key, iv);
            Console.WriteLine(text);
            Console.WriteLine(CryptLib.Decrypt(text, key));
        }
    }
}