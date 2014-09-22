Nutricheck

===================================================
INTRODUCTION
===================================================
NutriCheck System



===================================================
SETUP
===================================================
- Import nutricheck2.sql to you mysql database
- Edit /app/Config/database.php to your mysql connection settings
- Edit /app/Config/Core.php for debugging options
- Set WRITE permissions on folder /app
- Setup your IIS/Apache website to point to your NutriCheck folder
- Edit web.config/.htaccess if needed (Default should work)
- Run site


===================================================
LOCATIONS
===================================================
Dashboard : \app\Plugin\AclManagement\View\Users\dashboard.ctp
Top Menu : \app\View\Themed\Bootstrap\Elements\menu\admin_top_menu.ctp
