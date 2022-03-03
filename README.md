# Laravel-Food_Ordering_System
## Descriptions
 hello world
## Contributors
| Name | Student ID |
| :---: | :---: |
| Low Jia Hie | 21WMR05161 |
| Ng Jing Chong | 21WMR05174 |
| Khor Wen Xin | 21WMR05135 |
| Lee XinCi | 21WMR05147 |
| Wong Zi Jian | 21WMR05222 |

## Prerequisite

## How to Run
 1. Install this project in `?\xampp\htdocs`
 2. Using cmd and cd to the project file directory in `?\xampp\htdocs`
 3. Run `composer install` on your cmd or terminal
 4. In cmd enter a command `copy .env.example .env`
 5. Using XAMPP, open MySQL admin panel
 6. Create MySQL database named `foodorderingsystem`
 7. Update `DB_DATABASE` in `.env` to `foodorderingsystem`
 8. Run `php artisan key:generate`
 9. Run `php artisan migrate`
 10. Run `php artisan db:seed`
 11. Run `php artisan serve` 