ln -s /home/cpanel_username/project_name/storage/app/public /home/cpanel_sername/project_name/public/storage

 

 ln -s /home/joemagsc/ukz.joemags.co.zw/storage/app/public /home/joemagsc/ukz.joemags.co.zw/public/storage >/dev/null 2>&1



 ln -s /home/joemags/Code/Clients/UKZ/ukz-lara/storage/app/public /home/joemags/Code/Clients/UKZ/ukz-lara/public/storage

 ln -s /home/joemagsc/nhembe.co.zw/storage/app/public /home/joemagsc/nhembe.co.zw/public/storage >/dev/null 2>&1


  ln -s /home/joemagsc/ukz.joemags.co.zw/storage/app/public /home/joemagsc/ukz.joemags.co.zw/public/storage >/dev/null 2>&1


You should move your deploy_path folder outside public_html and make a symlink like this:

ln -s /your/deploy/path/current /path/to/public_html

ln -s /home/ukzchema/core_ukz/storage/app/public /home/ukzchema/core_ukz/public/storage
https://blog.netgloo.com/2016/01/29/deploy-laravel-application-on-shared-hosting/