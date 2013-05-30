watch("system/(.*).php") do |match|
	run_test %{tests/#{match[1]}Test.php}
end

watch("tests/.*Test.php") do |match|
	run_test match[0]
end

def run_test(file)
  unless File.exist?(file)
    puts "#{file} does not exist"
    return
  end
 
  puts "Running #{file}"
  result = `phpunit #{file}`
  puts result
end